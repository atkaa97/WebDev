<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (is_admin() && (Auth::user()->blocked == 0)) {
            return view('admin.home');
        } elseif (!is_admin() && (Auth::user()->blocked == 0)) {
            return view('home');
        } else {
//            $this->middleware('blocked');
            return view('blocked');
        }
    }



}