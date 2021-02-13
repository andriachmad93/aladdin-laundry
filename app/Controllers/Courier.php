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
        $this->orderDetailModel = model('OrderDetailModel');
    }

    public function index()
    {
        $data = ['title' => 'Beranda Kurir'];

        return view('courier/beranda', $data);
    }

    public function myPickup()
    {
        if (!logged_in()) {
            return redirect()->to(site_url('/login'));
        } else {
            $onGoingPickupOrder = $this->orderModel->getOnGoingPickupOrder(user()->id);
            $readyPickupOrder = $this->orderModel->getReadyPickupOrder();
            $data = [
                'title' => 'myPickup',
                'onGoingPickupOrder' => $onGoingPickupOrder,
                'readyPickupOrder' => $readyPickupOrder
            ];
            return view('courier/mypickup', $data);
        }
    }

    public function myDelivery()
    {
        if (!logged_in()) {
            return redirect()->to(site_url('/login'));
        } else {
            $onGoingShippedOrder = $this->orderModel->getOnGoingShippedOrder(user()->id);
            $readyShippedOrder = $this->orderModel->getReadyShippedOrder(user()->id);
            $data = [
                'title' => 'myPickup',
                'onGoingShippedOrder' => $onGoingShippedOrder,
                'readyShippedOrder' => $readyShippedOrder
            ];

            return view('courier/myDelivery', $data);
        }
    }
}
