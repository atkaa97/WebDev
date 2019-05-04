@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Blocked</div>
                    <div class="card-body">
                        @danger_text(You are blocked.)
                        <div class="text-center mt-5">
                            <a href="{{route('support')}}" class="btn btn-primary btn-bg">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
