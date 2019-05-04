@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="card-title">
                            <span><a href="{{route('tasks.show',$task->id)}}">{{$task->name}}</a> </span>
                        </h3>
                        <span class="float-right">Category : <a
                                href="{{route('category',$task->category->id)}}"
                                class="font-italic"> {{$task->category->name}}</a></span>
                        <span>Owner : <a href="{{route('owner',$task->user->id)}}"
                                         class="font-italic">{{$task->user->username}}</a></span>
                        <h3 class="mt-5">Description</h3>
                        <p class="card-text">{{$task->description}}</p>
                    </div>
                </div>
            </div>
        </div>

@endsection
