<?php

namespace App\Controllers;

class Track extends BaseController
{
    protected $orderModel;
    protected $trackingOrderModel;
    public function __construct()
    {
        $this->orderModel = model('orderModel');
        $this->trackingOrderModel = model('trackingOrderModel');
    }

    public function index()
    {
        $data = [
            'title' => 'Lacak pesanan'
        ];

        $orders = $this->request->getVar('order_codes');
        $tracking = [];
        if (!empty($orders)) {
            $code = explode(',', $orders);

            $i = 0;
            foreach ($code as $c) {
                if ($i == 5)
                    break;
                $order = $this->orderModel->where('order_code', trim($c))->first();
                if (!empty($order['id'])) {
                    $trackingOrder = $this->trackingOrderModel->getOrderTrack($order['id']);
                    $tracking[$c] = $trackingOrder;
                }
                $i++;
            }
        }

        $data['tracking'] = $tracking;
        $data['order_codes'] = $orders;

        return view('pages/trackorders', $data);
    }
}
