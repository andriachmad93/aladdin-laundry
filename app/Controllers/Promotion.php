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
}
