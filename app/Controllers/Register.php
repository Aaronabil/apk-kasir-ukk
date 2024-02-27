<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index()
    {
        echo view('auth/register');
    }

    public function process()
    {
        echo "proses";
    }
}
