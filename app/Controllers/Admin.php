<?php

namespace App\Controllers;

use CodeIgniter\HTTP\IncomingRequest;
use Config\App;
use App\Helpers\AjaxOutput;
use Exception;

class Admin extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = ['title' => 'Beranda Admin'];

        return view('pages/admin/beranda', $data);
    }
}
