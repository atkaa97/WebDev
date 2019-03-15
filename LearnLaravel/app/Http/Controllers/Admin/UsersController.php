<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::query()->where('id', '<>', auth()->id())->get();
        return view('admin.users', compact('users'));
    }

    public function userShow($id)
    {
        $user = User::query()->find($id);
        if ($user) {
            return view('admin.showUser', compact('user'));
        } else {
            return redirect(route('adminUsers'))->with('userNotFound', 'User Is Not Found.');
        }
    }

    public function userEdit($id)
    {
        $user = User::query()->find($id);
        if ($user) {
            return view('admin.editUser', compact('user'));
        } else {
            return redirect(route('adminUsers'))->with('userNotFound', 'User Is Not Found.');
        }
    }

}
