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
		if (!logged_in() || !in_groups(['Admin'])) {
			return redirect()->to(site_url('/login'));
		}

		$data = [
			'title' => 'Pelanggan',
			'users' => $this->userModel->getCustomer()
		];
		
		return view('pages/admin/customer', $data);
	}
}
