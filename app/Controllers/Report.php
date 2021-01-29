<?php

namespace App\Controllers;

class Report extends BaseController
{
	public function transactions()
	{
		$data = [
			'title' => 'Transaksi'
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
