@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 mb-4">
                <h2 class="text-center m-4">{{$category->name}} Tasks</h2>
                <div class="card h-100">
                    <div class="card-body">
                        @foreach($tasks as $task)
                            <h3 class="card-title mt-4">
                                <span><a href="{{route('tasks.show',$task->id)}}">{{$task->name}}</a> </span>
                            </h3>
                            <span>Owner : <a href="{{route('owner',$task->user->id)}}"
                                             class="font-italic">{{$task->user->username}}</a></span>
                            <h3 class="mt-2">Description</h3>
                            <p class="card-text">{{$task->description}}</p>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

@endsection
