<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        echo view('layout/header');
        echo "hahaha";
        echo view('layout/footer');
    }

    public function about()
    {
        return view('pages/tentang-kami');
    }
}
