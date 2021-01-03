<?php

namespace App\Controllers;

class Item extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Item'
		];
		
		return view('pages/admin/item', $data);
	}
}
