<?php

namespace App\Controllers;

class Owner extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Beranda Owner'];

        return view('pages/owner/beranda', $data);
    }
}
