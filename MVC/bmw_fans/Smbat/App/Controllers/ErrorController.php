<?php

namespace App\Controllers;

class ErrorController extends Controller
{
    // 404/not found page
    public function index()
    {
        $referer = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : null;
        echo view('404', ['referer' => $referer]);
    }
}