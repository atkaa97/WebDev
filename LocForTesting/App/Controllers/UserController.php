<?php

namespace App\Controllers;

class UserController extends Controller
{
    public function index()
    {

        echo view('user/index');
    }
}