<?php

namespace App\Controllers;

class Report extends BaseController
{
	public function transactions()
	{
		$data = [
			'title' => 'Transaction'
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
    
    public function dashboard()
	{
		$data = [
			'title' => 'Dashboard'
		];
		
		return view('pages/admin/sales-trend', $data);
	}
}
