<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    static $user;

    public function index()
    {
        return view('admin.users');
    }

    public function User($id, $action)
    {
        self::$user = DB::table('users')->find($id);
        if (self::$user) {
            if (self::$user->is_admin == 0) {
                self::$user->is_admin = '<i class="far fa-times-circle text-danger fa-lg"></i>';
            } else {
                self::$user->is_admin = '<i class="far fa-check-circle text-success fa-lg"></i>';
            }
            switch ($action) {
                case 'show':
                    return view('admin.showUser');
                    break;
                case 'edit':
                    return view('admin.editUser');
                default:
                    return redirect(route('adminUsers'));
            }
        } else {
            return redirect(route('adminUsers'))->with('userNotFound', 'User Is Not Found.');
        }
    }
}
