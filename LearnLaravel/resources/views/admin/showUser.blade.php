@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                @if (session('userNotFound'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('userNotFound') }}
                    </div>
                @endif
                <div class="card col-md-8 m-auto">
                    <div class="card-body">
                        <h5 class="card-title"><span class="float-left">Username</span>
                            <span
                                class="float-right">{{\App\Http\Controllers\Admin\UsersController::$user->username}}</span>
                        </h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span class="float-left">Email</span>
                            <span
                                class="float-right">{{\App\Http\Controllers\Admin\UsersController::$user->email}}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="float-left">First Name</span>
                            <span
                                class="float-right">{{\App\Http\Controllers\Admin\UsersController::$user->first_name}}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="float-left">Last Name</span>
                            <span
                                class="float-right">{{\App\Http\Controllers\Admin\UsersController::$user->last_name}}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="float-left">Age</span>
                            <span
                                class="float-right">{{\App\Http\Controllers\Admin\UsersController::$user->age}}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="float-left">Is Admin</span>
                            <span
                                class="float-right">{!! \App\Http\Controllers\Admin\UsersController::$user->is_admin !!}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="float-left">Email Verified</span>
                            <span
                                class="float-right">{{\App\Http\Controllers\Admin\UsersController::$user->email_verified_at}}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="float-left">Created</span>
                            <span
                                class="float-right">{{\App\Http\Controllers\Admin\UsersController::$user->created_at}}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="float-left">Updated</span>
                            <span
                                class="float-right">{{\App\Http\Controllers\Admin\UsersController::$user->updated_at}}</span>
                        </li>
                    </ul>
                    <div class="card-body">
                        <a href="edit" class="card-link">Edit</a>
                        <a href="#" class="card-link">Block</a>
                        <a href="#" class="card-link">Delete</a>
                        <a href="{{route('adminUsers')}}" class="card-link float-right">Users List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
