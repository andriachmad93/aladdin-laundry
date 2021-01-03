<?php

namespace App\Controllers;

class Customer extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Customer'
		];
		
		return view('pages/admin/customer', $data);
	}
}
