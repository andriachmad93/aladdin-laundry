<?php

namespace App\Controllers;

use CodeIgniter\HTTP\IncomingRequest;
use Config\App;

class Address extends BaseController
{
    protected $addressModel, $db;

    public function __construct()
    {
        $this->addressModel = model('AddressModel');
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $address = $this->addressModel->GetAddressByCustomer(user()->id);

        $data = [
            'title' => 'Alamat',
            'address' => $address
        ];

        return view('address/index', $data);
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
        if ($this->request->isAJAX()) {
            if (!$this->addressModel->AddressReachMaxUse(user()->id)) {
            }
        } else {
        }
    }
}
