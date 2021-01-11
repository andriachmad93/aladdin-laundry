<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Tentang kami'
        ];
        return view('pages/about', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'Tentang kami'
        ];
        return view('pages/about', $data);
    }
}
