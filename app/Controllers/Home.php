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
		$db = \Config\Database::connect();
		$query = $db->query('select * from address');
		dd($query->getResultArray());
	}
	//--------------------------------------------------------------------

}
