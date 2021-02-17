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
        if (!logged_in() || !in_groups(['Kurir'])) {
            return redirect()->to(site_url('/login'));
        }
        $data = ['title' => 'Beranda Kurir'];

        return view('courier/beranda', $data);
    }

    public function myPickup()
    {
        if (!logged_in() || !in_groups(['Kurir'])) {
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

    /* [httpGet] */
    public function onGoingPickupOrder()
    {
        if (!logged_in()) {
            return redirect()->to(site_url('/login'));
        } else {
            if ($this->request->isAJAX()) {
                $response = $this->orderModel->getOnGoingPickupOrder(user()->id);
                echo json_encode($response);
            } else {
                echo "BAD REQUEST";
            }
        }
    }

    /* [httpGet] */
    public function readyPickupOrder()
    {
        if (!logged_in()) {
            return redirect()->to(site_url('/login'));
        } else {
            if ($this->request->isAJAX()) {
                $response = $this->orderModel->getReadyPickupOrder();
                echo json_encode($response);
            } else {
                echo "BAD REQUEST";
            }
        }
    }

    public function myDelivery()
    {
        if (!logged_in() || !in_groups(['Kurir'])) {
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

    /* [httpGet] */
    public function onGoingShippedOrder()
    {
        if (!logged_in()) {
            return redirect()->to(site_url('/login'));
        } else {
            if ($this->request->isAJAX()) {
                $response = $this->orderModel->getOnGoingShippedOrder(user()->id);
                echo json_encode($response);
            } else {
                echo "BAD REQUEST";
            }
        }
    }

    /* [httpGet] */
    public function readyShippedOrder()
    {
        if (!logged_in()) {
            return redirect()->to(site_url('/login'));
        } else {
            if ($this->request->isAJAX()) {
                $response = $this->orderModel->getReadyShippedOrder(user()->id);
                echo json_encode($response);
            } else {
                echo "BAD REQUEST";
            }
        }
    }
    
}
