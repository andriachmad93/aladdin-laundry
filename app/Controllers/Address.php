<?php

namespace App\Controllers;

use CodeIgniter\HTTP\IncomingRequest;
use Config\App;
use App\Helpers\AjaxOutput;
use Exception;

class Address extends BaseController
{
    protected $addressModel, $userModel, $db, $ajaxOutput;

    public function __construct()
    {
        $this->addressModel = model('AddressModel');
        $this->userModel = model('userModel');
        $this->db = \Config\Database::connect();
        $this->ajaxOutput = new AjaxOutput();
    }

    public function index()
    {
        if (empty(user())) {
            return redirect()->to(site_url('/login'));
        } else {
            $address = $this->addressModel->GetAddressByCustomer(user()->id);

            $data = [
                'title' => 'Alamat',
                'address' => $address
            ];

            return view('address/index', $data);
        }
    }

    public function getKota()
    {
        if ($this->request->isAJAX()) {
            $searchTerm = $this->request->getPost('searchTerm');
            $response = $this->addressModel->GetKota($searchTerm);

            echo json_encode($response);
        } else {
            echo "BAD REQUEST";
        }
    }

    public function getDetailAddress()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $response = $this->addressModel->getById($id);

            echo json_encode($response);
        } else {
            echo "BAD REQUEST";
        }
    }

    public function save()
    {
        try {
            if ($this->request->isAJAX()) {
                if ($this->addressModel->AddressReachMaxUse(user()->id) && empty($this->request->getVar('id'))) {
                    $this->ajaxOutput->status = 400;
                    $this->ajaxOutput->message = "Alamat yang dapat didaftarkan maksimum hanya 3.";
                } else {
                    if (!$this->validate([
                        'address_name' => [
                            'rules' => 'required|alpha_numeric_space|min_length[3]',
                            'errors' => [
                                'required' => 'Nama alamat harus diisi.',
                                'alpha_numeric_space' => 'Nama alamat harus alpha numerik.',
                                'min_length' => 'Nama alamat minimal {param} karakter.',
                            ]
                        ],
                        'receiver' => [
                            'rules' => 'required|alpha_numeric_space|min_length[3]',
                            'errors' => [
                                'required' => 'Nama penerima harus diisi.',
                                'alpha_numeric_space' => 'Nama penerima harus alpha numerik.',
                                'min_length' => 'Nama penerima minimal {param} karakter.',
                            ]
                        ],
                        'receiver_phone' => [
                            'rules' => 'required|numeric|min_length[9]',
                            'errors' => [
                                'required' => 'Nomor HP harus diisi.',
                                'numeric' => 'Nomor HP harus angka.',
                                'min_length' => 'Nomor HP minimal {param} karakter.',
                            ]
                        ],
                        'district_id' => [
                            'rules' => 'required|numeric',
                            'errors' => [
                                'required' => 'Kota atau kecamatan harus diisi.',
                                'numeric' => 'Kota atau kecamatan tidak valid.',
                            ]
                        ],
                        'zip_code' => [
                            'rules' => 'required|numeric',
                            'errors' => [
                                'required' => 'Kode pos harus diisi.',
                                'numeric' => 'Kode pos harus angka.',
                            ]
                        ],
                        'address' => [
                            'rules' => 'required|min_length[10]',
                            'errors' => [
                                'required' => 'Alamat harus diisi.',
                                'numeric' => 'Alamat minimal {param} karakter.',
                                'min_length' => 'Alamat minimal {param} karakter.',
                            ]
                        ],
                    ])) {
                        $data = array('error' => service('validation')->getErrors());
                        $this->ajaxOutput->status = 400;
                        $this->ajaxOutput->data = json_encode($data);
                    } else {
                        $this->ajaxOutput->status = 200;
                        $this->ajaxOutput->message = "Alamat berhasil disimpan.";

                        $id = $this->request->getVar('id');
                        $address_id = $this->addressModel->insert([
                            'id' => $id,
                            'address_name' => $this->request->getVar('address_name'),
                            'receiver' => $this->request->getVar('receiver'),
                            'receiver_phone' => $this->request->getVar('receiver_phone'),
                            'district_id' => $this->request->getVar('district_id'),
                            'zip_code' => $this->request->getVar('zip_code'),
                            'address' => $this->request->getVar('address'),
                            'customer_id' => user()->id,
                            'is_active' => 1
                        ]);
                        if (empty($id) && $this->addressModel->GetRecordedAddress(user()->id) == 1) {
                            $this->userModel->updateDefaultAddress(user()->id, $address_id);
                        }
                    }
                }
            } else {
                $this->ajaxOutput->status = 400;
                $this->ajaxOutput->message = "Bad request!";
            }
        } catch (Exception $e) {
            $this->ajaxOutput->status = 500;
            $this->ajaxOutput->message = $e->getMessage();
        }
        echo json_encode($this->ajaxOutput);
    }

    public function delete($id)
    {
        try {
            if ($this->request->isAJAX()) {
                $this->ajaxOutput->status = 200;
                $this->ajaxOutput->message = "Alamat berhasil dihapus.";
                $this->addressModel->DeleteAddress($id);
            }
        } catch (Exception $e) {
            $this->ajaxOutput->status = 500;
            $this->ajaxOutput->message = $e->getMessage();
        }
        echo json_encode($this->ajaxOutput);
    }

    public function updateDefaultAddress($id)
    {
        try {
            if ($this->request->isAJAX()) {
                $this->ajaxOutput->status = 200;
                $this->ajaxOutput->message = "Alamat default berhasil diubah.";
                $this->userModel->updateDefaultAddress(user()->id, $id);
            }
        } catch (Exception $e) {
            $this->ajaxOutput->status = 500;
            $this->ajaxOutput->message = $e->getMessage();
        }
        echo json_encode($this->ajaxOutput);
    }
}
