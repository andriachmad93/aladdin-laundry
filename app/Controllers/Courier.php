<?php

namespace App\Controllers;

use CodeIgniter\HTTP\IncomingRequest;
use Config\App;
use App\Helpers\AjaxOutput;
use Exception;

class Courier extends BaseController
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = model('OrderModel');
    }

    public function index()
    {
        $data = ['title' => 'Beranda Kurir'];

        return view('courier/beranda', $data);
    }

    public function myPickup()
    {
        $data = ['title' => 'myPickup'];

        return view('courier/mypickup', $data);
    }

    public function myDelivery()
    {
        $data = ['title' => 'myPickup'];

        return view('courier/myDelivery', $data);
    }
}
