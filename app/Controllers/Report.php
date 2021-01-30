<?php

namespace App\Controllers;

class Report extends BaseController
{
	protected $orderModel;

	public function __construct()
	{
		$this->orderModel = model('OrderModel');
	}

	public function transactions()
	{
		$data = [
			'title' => 'Transaksi',
			'order_list' => $this->orderModel->getOrderTransaction()
		];
		
		return view('pages/admin/transaction', $data);
    }
    
    public function loyal_customers()
	{
		$data = [
			'title' => 'Loyal Customers'
		];
		
		return view('pages/admin/loyal-customer', $data);
	}
	
	public function sales_trend()
	{
		$data = [
			'title' => 'Tren Penjualan'
		];
		
		return view('pages/admin/sales-trend', $data);
    }
}
