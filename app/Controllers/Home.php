<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
//        return view('adminpannel/auth/login');
        return view('interface/home');
    }
}
