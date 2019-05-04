@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        @if (session('userNotFound'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('userNotFound') }}
                            </div>
                        @endif
                        @if (session('userDeleted'))
                            <div class="alert alert-success" role="alert">
                                {{ session('userDeleted') }}
                            </div>
                        @endif
                        @if (session('userUpdated'))
                            <div class="alert alert-success" role="alert">
                                {{ session('userUpdated') }}
                            </div>
                        @endif
                        @if(count($users) != 0)
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Is Admin</th>
                                    <th scope="col">Is Blocked</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{!!  $user->is_admin ? '<i class="far fa-check-circle text-success fa-lg"></i>' : '<i class="far fa-times-circle text-danger fa-lg"></i>' !!}</td>
                                        <td>{!!  $user->blocked ? '<i class="far fa-check-circle text-success fa-lg"></i>' : '<i class="far fa-times-circle text-danger fa-lg"></i>' !!}</td>
                                        <td>
                                            <a href="{{route('users.show',$user->id)}}"
                                               class="btn btn-xs btn-secondary show-custom">Show</a>
                                            <a href="{{route('users.edit',$user->id)}}"
                                               class="btn btn-xs btn-secondary edit-custom ">Edit</a>
                                            <a href="{{route('blockUser',$user->id)}}" class="btn btn-xs btn-secondary block-custom">{{blockStr($user->id)}}</a>
                                            <form action="{{route('users.destroy',$user->id)}}" style="display: inline"
                                                  method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-xs btn-secondary delete-custom">
                                                    Delete
                                                </button>
                                            </form>&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-warning" role="alert">
                                <h2>Not Found Users.</h2>
                                <p>There is no information to display.</p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
