<?php

namespace App\Controllers;

class ErrorController
{
    public function index()
    {
        echo view('404');
    }
}