<?php

use Illuminate\Support\Facades\Auth;
use App\Models\User;

function is_admin()
{
    if (Auth::check() && Auth::user()->is_admin == 1) {
        return true;
    } else {
        return false;
    }
}
function is_blocked()
{
    if (Auth::check() && Auth::user()->blocked == 1) {
        return true;
    } else {
        return false;
    }
}

function blockStr($id){
    $user = User::query()->find($id);
    if ($user->blocked){
        return 'Unblock';
    }else{
        return 'Block';
    }
}

function navbar_style()
{
    if (is_admin()) {
        return 'navbar-dark bg-dark';
    } else {
        return 'navbar-light';
    }
}

function loginNewSocialUser($social_name, $social_user)
{
    $user_info_db = User::where($social_name . '_id', $social_user->id)->first();
    Auth::loginUsingId($user_info_db->id);
}


