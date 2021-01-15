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

	public function add_item_page()
	{
		$data = [
			'title' => 'Add Item'
		];
		
		return view('pages/admin/createpage/item', $data);
	}

	public function update_item_page($id)
	{
		$data = [
			'title' => 'Ubah Item'
		];
		
		return view('pages/admin/updatepage/item', $data);
	}
}
