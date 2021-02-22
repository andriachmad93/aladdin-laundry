<?php

namespace App\Controllers;

use App\Models\UserModel;
use Config\App;
use App\Entities\User as MythUser;
use CodeIgniter\Model;

class User extends BaseController
{
    protected $userModel;
    protected $promotionModel;
    protected $pointTransactionModel;
    protected $helpers = ['auth'];

    protected $auth;

    public function __construct()
    {
        $this->auth = service('authentication');
        $this->userModel = model('UserModel');
        $this->pointTransactionModel = model('PointTransactionModel');
        $this->promotionModel = model('PromotionModel');
        $this->authGroup = model('AuthGroupModel');
        $this->authGroupUser = model('AuthGroupUserModel');
    }

    public function index()
    {
        if (!logged_in()) {
            return redirect()->to(site_url('/login'));
        } else {
            $_user  = $this->userModel->where('id', user()->id)->first();

            $data = [
                'title' => 'Profil saya',
                'user' => $_user,
            ];

            return view('user/myaccount', $data);
        }
    }

    public function user_group()
    {
        $data = [
            'title' => 'Grup Pengguna',
            'users' => $this->userModel->getUserAccess()
        ];

        return view('pages/admin/user-group', $data);
    }

    public function edit_user_group($id)
    {
        if (!logged_in() || !in_groups(['Admin'])) {
            return redirect()->to(site_url('/login'));
        }

        $data = [
            'title' => 'Grup Pengguna',
            'user' => $this->userModel->getUserAccess($id)[0],
            'auth_groups' => $this->authGroup->getAuthGroup()
        ];

        return view('pages/admin/updatepage/user-group', $data);
    }

    public function update_user_group($id)
    {
        if (!logged_in() || !in_groups(['Admin'])) {
            return redirect()->to(site_url('/login'));
        }

        $this->authGroupUser->update($id, ['group_id' => (int) $this->request->getPost('group_id')]);

        return redirect()->to('/user/user_group')->with('message', 'Status Pengguna berhasil diganti');
    }

    public function update()
    {
        if (!$this->validate([
            'firstname' => [
                'rules' => 'required|alpha_numeric_space|min_length[3]',
                'errors' => [
                    'required' => 'Nama depan harus diisi.',
                    'alpha_numeric_space' => 'Nama depan harus alpha numerik.',
                    'min_length' => 'Nama depan minimal {param} karakter.',
                ]
            ],
            'lastname' => [
                'rules' => 'required|alpha_numeric_space|min_length[3]',
                'errors' => [
                    'required' => 'Nama belakang harus diisi.',
                    'alpha_numeric_space' => 'Nama belakang harus alpha numerik.',
                    'min_length' => 'Nama belakang minimal {param} karakter.',
                ]
            ],
            'phone' => [
                'rules' => 'required|numeric|min_length[9]',
                'errors' => [
                    'required' => 'Nomor telepon harus diisi.',
                    'numeric' => 'Nomor telepon harus angka.',
                    'min_length' => 'Nomor telepon minimal {param} karakter.',
                ]
            ],
        ])) {
            return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
        }

        $data = [
            'id' => $this->request->getVar('id'),
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'phone' => $this->request->getVar('phone'),
            'gender' => $this->request->getVar('gender'),
            'date_of_birth' => $this->request->getVar('date_of_birth'),
        ];

        $file = $this->request->getFile('photo');

        if ($file->isValid()) {
            $newFileName = user_id() . "." . $file->getExtension();
            $file->move('files/userpics/', $newFileName, true);
            $data['photo'] = $newFileName;
        }

        $this->userModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/user')->withCookies()->with('message', 'Data berhasil disimpan');
    }

    public function myorders()
    {
        if (!logged_in() || !in_groups('Customer')) {
            return redirect()->to(site_url('/login'));
        } else {
            $_user  = $this->userModel->where('id', user()->id)->first();

            $order = model("OrderModel");

            $data = [
                'title' => 'Pesanan saya',
                'user' => $_user,
                'order' => $order->getMyOrders(user()->id)
            ];

            return view('user/myorders', $data);
        }
    }

    public function mypoints()
    {
        if (!logged_in() || !in_groups('Customer')) {
            return redirect()->to(site_url('/login'));
        } else {
            $_user  = $this->userModel->where('id', user()->id)->first();

            $point = $this->pointTransactionModel->getPointHistory(user_id());
            $data = [
                'title' => 'Poin saya',
                'user' => $_user,
                'point_history' => $point,
            ];

            return view('user/mypoints', $data);
        }
    }

    public function redeem()
    {
        $code = $this->request->getVar('redeem_code');
        $data = $this->promotionModel->checkPromotion($code, 'poin', user_id());

        if (!empty($data['data'])) {
            $user = $this->userModel->find(user_id());
            $this->pointTransactionModel->save([
                'user_id' => user_id(),
                'point' => $data['data']['amount'],
                'promotion_id' => $data['data']['id'],
                'is_active' => 1,
                'transaction_date' => date("Y-m-d H:i:s")
            ]);

            $updatedPoint = (int)$user->point + $data['data']['amount'];
            $dataBalance = [
                'customer_id' => user_id(),
                'point' => $updatedPoint,
            ];
            $this->userModel->updatePointBalance($dataBalance);
            return redirect()->to(site_url('/user/mypoints'))->with('message', 'Poin berhasil ditambahkan.');
        } else {
            $message = service('validation')->getErrors();
            $message['redeem_code'] = $data['message'];
            return redirect()->back()->withInput()->with('errors', $message);
        }
    }

    public function changepassword()
    {
        if (!logged_in() || !in_groups('Customer')) {
            return redirect()->to(site_url('/login'));
        } else {
            $data = [
                'title' => 'Ubah password',
            ];
            return view('user/changepassword', $data);
        }
    }

    public function updatepassword()
    {
        if (!empty($this->request->getPost())) {
            $rules = [
                'current_password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password saat ini harus diisi.'
                    ]
                ],
                'password'         => [
                    'rules' => 'required|strong_password',
                    'errors' => [
                        'required' => 'Password harus diisi.',
                        'strong_password' => 'Password harus kuat.',
                    ]
                ],
                'pass_confirm'     => [
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => 'Ulangi Password harus diisi.',
                        'matches' => 'Ulangi Password harus sama dengan Password.',
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
            }

            $password = $this->request->getVar('current_password');
            $new_password = $this->request->getVar('password');
            $this->auth->attempt(['username' => user()->username, 'password' => $password], false);
            $user = new MythUser();
            $user->setPassword($new_password);

            $data = ['password_hash' => $user->getPasswordHash()];
            $this->userModel->update(user_id(), $data);

            return redirect()->to(site_url('/user'))->with('message', 'Password berhasil diubah.');
        }
    }
}
