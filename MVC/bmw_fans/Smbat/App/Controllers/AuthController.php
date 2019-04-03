<?php

namespace App\Controllers;

use App\Models\User;
use Core\Auth;

class AuthController extends Controller
{
    // login page
    public function login()
    {
        if (Auth::checkIfAuth()) {
            redirect('/user');
        }
        echo view('user/login');
        session()->pull('old');
        session()->pull('errors');
    }

    // login request submit
    public function loginSubmit()
    {
        $errors = $this->validate(request(), [
            'email' => 'required|email|max:100',
            'password' => 'required',
        ]);

        $email = request()->get('email');
        $password = request()->get('password');

        $user = new User();
        $user = $user->where("email = '" . $email . "'")->first();
        if (!$user && $password) {
            $errors['email'] = ['no user with this credentials'];
        } elseif ($user && $password && !password_verify($password, $user->password)) {
            $errors['email'] = ['no user with this credentials'];
        }

        if (count($errors)) {
            session()->set('errors', $errors);
            session()->set('old', request()->all());
            redirect('/user/login');
        } else {
            $token = md5(rand());
            $this->updateToken($user->id, $token);
            session()->set('id', $user->id);
            session()->set('token', $token);
            redirect('/user');
        }
    }

    // register page
    public function register()
    {
        if (Auth::checkIfAuth()) {
            redirect('/user');
        }
        echo view('user/register');
        session()->pull('old');
        session()->pull('errors');
    }

    // register request submit
    public function registerSubmit()
    {
        $errors = $this->validate(request(), [
            'username' => 'required|min:6|max:100',
            'email' => 'required|email',
            'first_name' => 'required|min:2|max:100',
            'password' => 'required',
        ]);

        $user = new User();
        $user = $user->where("username = '".request()->get('username')."'")->first();
        if ($user) {
            $errors['username'] = ['username already used'];
        }

        if (count($errors)) {
            session()->set('errors', $errors);
            session()->set('old', request()->all());
            redirect('/user/register');
        }

        $data = request()->all();

        $user = new User();
        $user->username = $data['username'];
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->age = $data['age'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $user->token = md5(rand());
        $user->insert();

        $new_user = new User();
        $new_user = $new_user->where('token = "' . $user->token . '"')->first();

        session()->set('id', $new_user->id);
        session()->set('token', $new_user->token);

        redirect('/user');
    }

    // update user token for login
    public function updateToken($id, $token)
    {
        $user = new User();
        $user->set(['token'], [$token])
            ->where("id = $id")
            ->update();
    }

    // auth user logout
    public function logout()
    {
        Auth::logOut();
        redirect('/');
    }
}