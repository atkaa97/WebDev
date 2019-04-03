<?php

namespace Core;

use App\Models\User;

class Auth
{
    // check from session user authentication
    public static function checkIfAuth()
    {
        if (session_id() === '') {
            session_start();
        }
        if ($_SESSION && isset($_SESSION['token']) && isset($_SESSION['id'])) {
            $userId = $_SESSION['id'];
            $uncheckedToken = $_SESSION['token'];
            $user = new User();
            $token = $user->select('token')->where("id = '".$userId."'")->first()->token;
            if ($uncheckedToken === $token) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // user logout
    public static function logOut()
    {
        session_destroy();
        session_abort();
    }

    // get auth user id
    public static function getId()
    {
        if (session_id() === '') {
            session_start();
        }
        if ($_SESSION && isset($_SESSION['id'])) {
            return $_SESSION['id'];
        }
        return false;
    }

    // get auth user's username
    public static function getUserName()
    {
        if (session_id() === '') {
            session_start();
        }
        if ($_SESSION && isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $user = new User();
            $person = $user->where("id = '".$id."'")->first();
            return $person->username;
        }
        return false;
    }

    // get auth user's full name
    public static function getFullName()
    {
        if (session_id() === '') {
            session_start();
        }
        if ($_SESSION && isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $user = new User();
            $person = $user->where("id = '".$id."'")->first();
            $first_name = $person->first_name;
            $last_name = $person->last_name;
            return $first_name . ' ' . $last_name;
        }
        return false;
    }

    // check is user is admin
    public static function isAdmin()
    {
        if (session_id() === '') {
            session_start();
        }
        if ($_SESSION && isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $user = new User();
            $person = $user->where("id = '".$id."'")->first();
            return $person->is_admin;
        }
        return false;
    }
}