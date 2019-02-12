<?php

namespace App\Controllers;

use App\Models\User;
use Core\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!Auth::checkIfAuth()) {
            redirect('/');
        }
    }

    // users listing
    public function index()
    {
        $users = new \App\Models\User();
        $users = $users->get();
        echo view('user/index', ['users' => $users]);
    }

    // user single page
    public function show()
    {
        $id = get_id();
        $user = new \App\Models\User();
        $user = $user->where("id = $id")->first();
        if (!$user) {
            redirect('/error');
        }

        echo view('user/show', ['user' => $user]);
    }

    // user edit page
    public function edit()
    {
        $id = get_id();
        $user = new \App\Models\User();
        $user = $user->where("id = $id")->first();
        if (!$user || (!Auth::isAdmin() && $id !== Auth::getId())) {
            redirect('/error');
        }

        echo view('user/edit', ['user' => $user]);
        session()->pull('old');
        session()->pull('errors');
    }

    // update user data
    public function update()
    {
        $id = get_id();
        $errors = $this->validate(request(), [
            'username' => 'required|min:6|max:100',
            'email' => 'required|email',
            'first_name' => 'required|min:2|max:100',
        ]);

        $user = new User();
        $user = $user->where("id <> $id AND username = '" . request()->get('username') . "'")->first();
        if ($user) {
            $errors['username'] = ['username already used'];
        }

        if (count($errors)) {
            session()->set('errors', $errors);
            session()->set('old', request()->all());
            redirect('/user/edit/' . $id);
        }

        $data = request()->all();
        $is_admin = isset($data['is_admin']) ? 1 : 0;

        $user = new User();
        $user->set([
            'username',
            'email',
            'first_name',
            'last_name',
            'age',
            'is_admin',
        ], [
            $data['username'],
            $data['email'],
            $data['first_name'],
            $data['last_name'],
            $data['age'],
            $is_admin,
        ])->where("id = $id")->update();

        redirect('/user/show/' . $id);
    }

    public function delete()
    {
        $id = request()->get('id');
        $user = new User();
        $user = $user->where("id = $id");

        if (!$user->first() || (!Auth::isAdmin() && $id !== Auth::getId())) {
            $return = [
                'status' => 'error',
                'message' => "Failed User Delete"
            ];
            http_response_code(403);
        } else {
            $user->delete();
            $return = [
                'status' => 'success',
                'message' => "User Deleted successfully"
            ];
            http_response_code(200);
        }

        echo json_encode($return);
    }

    // auth user profile
    public function myProfile()
    {
        echo view('user/profile');
    }
}