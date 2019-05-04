@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                @if (session('userNotFound'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('userNotFound') }}
                    </div>
                @endif
                <h2 class="text-center mb-4">Owner</h2>
                <div class="card col-md-9 m-auto">
                    <div class="card-body">
                        <h5 class="card-title"><span class="float-left">Username</span>
                            <span
                                class="float-right">{{ $owner->username}}</span>
                        </h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span class="float-left">Email</span>
                            <span
                                class="float-right">{{ $owner->email}}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="float-left">First Name</span>
                            <span
                                class="float-right">{{ $owner->first_name}}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="float-left">Last Name</span>
                            <span
                                class="float-right">{{ $owner->last_name}}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="float-left">Age</span>
                            <span
                                class="float-right">{{ $owner->age}}</span>
                        </li>
                    </ul>
                </div>

                <h2 class="text-center m-4">{{$owner->username}}'s Tasks</h2>

                <div class="card col-md-9 m-auto">
                    <div class="container">
                        @if(count($tasks) == 0)
                            <div class="alert alert-warning" role="alert">
                                <h2>Not Found Tasks.</h2>
                                <p>There is no information to display.</p>
                            </div>
                        @else
                            @foreach($tasks as $task)
                                <div class="row">
                                    <div class="col-md-12 mt-3 mb-2">
                                        <h3 class="card-title mb-4">
                                            <span><a href="{{route('tasks.show',$task->id)}}"> {{$task->name}} </a></span>
                                        </h3>
                                        <span class="float-right">Category : <a href="{{route('category',$task->category->id)}}" class="font-italic">{{$task->category->name}} </a></span>
                                        <h4 class="mt-1">Description</h4>
                                        <p class="card-text mt-2 mb-2"
                                        >{{$task->description}}</p>
                                    <hr>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
