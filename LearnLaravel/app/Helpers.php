<?php

namespace App;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Helpers
{
    public static function is_admin()
    {
        if (Auth::check() && Auth::user()->is_admin == 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function navbar_style()
    {
        if (self::is_admin()) {
            return 'navbar-dark bg-dark';
        } else {
            return 'navbar-light';
        }
    }

    public static function loginNewSocialUser($social_name, $social_user)
    {
        $user_info_db = User::where($social_name . '_id', $social_user->id)->first();
        Auth::loginUsingId($user_info_db->id);
    }
}

