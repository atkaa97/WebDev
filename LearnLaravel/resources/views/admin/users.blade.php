@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        @if (session('userNotFound'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('userNotFound') }}
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
                                        <td>
                                            <a href="{{route('users.show',$user->id)}}" title="Show More Info"
                                               class="text-primary"><i
                                                    class="fas fa-eye fa-lg"></i></a>&nbsp;&nbsp;
                                            <a href="users/{{$user->id}}/edit" title="Edit" class="text-success"><i
                                                    class="fas fa-edit fa-lg"></i></a>&nbsp;&nbsp;
                                            <a href="" title="Block" class="text-danger"><i
                                                    class="fas fa-ban fa-lg"></i></a>&nbsp;&nbsp;
                                            <a href="" title="Delete" class="text-dark"><i
                                                    class="fas fa-trash-alt fa-lg"></i></a>&nbsp;&nbsp;
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
