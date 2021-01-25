<?php

namespace App\Controllers;

use App\Models\UserModel;
use Config\App;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = model('UserModel');
    }

    public function index()
    {
        if (empty(user())) {
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
        $this->userModel->save([
            'id' => $this->request->getVar('id'),
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'phone' => $this->request->getVar('phone'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/user')->withCookies()->with('message', 'Data berhasil disimpan');
    }

    public function myorders()
    {
        if (empty(user())) {
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
        if (empty(user())) {
            return redirect()->to(site_url('/login'));
        } else {
            $_user  = $this->userModel->where('id', user()->id)->first();

            $data = [
                'title' => 'Poin saya',
                'user' => $_user,
            ];

            return view('user/mypoints', $data);
        }
    }
}
