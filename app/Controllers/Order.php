<?php

namespace App\Controllers;

class Order extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Order'
		];
		
		return view('pages/admin/order', $data);
	}
}
