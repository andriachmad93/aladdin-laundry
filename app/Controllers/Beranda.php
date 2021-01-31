<?php

namespace App\Controllers;

class Beranda extends BaseController {
    
    public function index()
	{
		if (!logged_in() || !in_groups(['Admin'])) {
			return redirect()->to(site_url('/login'));
		} else {
			$data = [
				'title' => 'Beranda'
			];
			
			return view('pages/admin/beranda', $data);	
		}
	}
}
