@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Tasks</div>
                    <div class="card-body">
                        @if (session('NotFound'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('NotFound') }}
                            </div>
                        @endif

                        @if(count($tasks) == 0)
                            <div class="alert alert-warning" role="alert">
                                <h2>Not Found Tasks.</h2>
                                <p>There is no information to display.</p>
                            </div>
                        @else
                            <div class="container">
                                <div class="row">
                                    @foreach($tasks as $task)
                                        <div class="col-lg-6 mb-4">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h4 class="card-title">
                                                    <span><a
                                                            href="{{route('tasks.show',$task->id)}}">{{$task->name}}</a> </span>
                                                    </h4>
                                                    <span class="float-right">Category : <a
                                                            href="{{route('category',$task->category->id)}}"
                                                            class="font-italic"> {{$task->category->name}}</a></span>
                                                    <span>Owner : <a href="{{route('owner',$task->user->id)}}"
                                                                     class="font-italic">{{$task->user->username}}</a></span>
                                                    <h3 class="mt-5">Description</h3>
                                                    <p class="card-text"
                                                       style="height: 115px;width: 415px;overflow: hidden"
                                                    >{{$task->description}}</p>
                                                    @if(strlen($task->description) > 300)
                                                        <a href="{{route('tasks.show',$task->id)}}"
                                                           class="btn-primary btn float-right btn-sm">Read More</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

