<?php

namespace Config;

use Myth\Auth\Config\Auth as MythAuthConfig;

class Auth extends MythAuthConfig
{
    public $views = [
        'login'              => 'Myth\Auth\Views\login',
        'register'          => 'Views\register',
        'forgot'          => 'Myth\Auth\Views\forgot',
        'reset'              => 'Myth\Auth\Views\reset',
        'emailForgot'      => 'Myth\Auth\Views\emails\forgot',
        'emailActivation' => 'Myth\Auth\Views\emails\activation',
    ];
    public $viewLayout = 'Myth\Auth\Views\layout';
}
