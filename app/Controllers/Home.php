<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Beranda'
		];
		return view('pages/home', $data);
	}

	public function CheckDb()
	{
		dd($db = \Config\Database::connect());
	}
	//--------------------------------------------------------------------

}
