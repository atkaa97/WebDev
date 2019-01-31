<?php

namespace App\Controllers;

class UserController
{
    public function index()
    {
        echo view('user/index');
    }
}