<?php

namespace App\Controllers;

class HomeController extends Controller
{
    // main/index page
    public function index()
    {
        echo view('home/index');
    }
}