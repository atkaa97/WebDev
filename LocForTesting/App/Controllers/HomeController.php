<?php

namespace App\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
//        $user = new User();
//        $user->name = 'Name';
//        $user->last_name = 'Yan';
//        $user->age = 18;
//        $user->insert();

        echo view('home/index');
    }
}