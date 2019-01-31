<?php

namespace App\Controllers;

class ErrorController extends Controller
{
    public function index()
    {
        echo view('404');
    }
}