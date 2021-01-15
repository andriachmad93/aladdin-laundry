<?php

namespace App\Controllers;

class Promotion extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Promotion'
		];
		
		return view('pages/admin/promotion', $data);
	}

	public function add_promotion_page()
	{
		$data = [
			'title' => 'Tambah Promosi'
		];
		
		return view('pages/admin/createpage/promotion', $data);
	}

	public function update_promotion_page($id)
	{
		$data = [
			'title' => 'Ubah Promosi'
		];
		
		return view('pages/admin/updatepage/promotion', $data);
	}
}
