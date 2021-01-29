<?php

namespace App\Controllers;

class Customer extends BaseController
{
	protected $userModel;

    public function __construct()
    {
        $this->userModel = model('UserModel');
	}
	
	public function index()
	{
		$data = [
			'title' => 'Customer',
			'users' => $this->userModel->getCustomer()
		];
		
		return view('pages/admin/customer', $data);
	}
}
