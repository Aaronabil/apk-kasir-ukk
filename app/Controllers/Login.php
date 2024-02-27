<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        echo view('auth/login');
    }

    public function process()
    {
        echo "proses";
    }
}
