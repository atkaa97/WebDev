@extends('layouts.admin')
@section('content')
    <div class="container">
        @if (session('userUpdated'))
            <div class="alert alert-success" role="alert">
                {{ session('userUpdated') }}
            </div>
        @endif
        <div class="row justify-content-center">

            <div class="col-md-8 float-right">
                <div class="card">
                    <div class="card-header">{{ __('Edit') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update',$user->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="username"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                           class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username', $user->username) }}" required
                                           autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email', $user->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="first_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                           class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                           name="first_name" value="{{ old('first_name',$user->first_name) }}" required
                                           autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                           class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                           name="last_name" value="{{ old('last_name',$user->last_name) }}" required
                                           autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                                <div class="col-md-6">
                                    <input id="age" type="number"
                                           class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age"
                                           value="{{ old('age',$user->age) }}" required autofocus>

                                    @if ($errors->has('age'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Is Blocked') }}</label>
                                <div class="col-md-6">
                                    <span>{!!  $user->blocked ? '<i class="far fa-check-circle text-success fa-lg"></i>' : '<i class="far fa-times-circle text-danger fa-lg"></i>' !!}</span>
                                </div>
                            </div>
                            <div class="form-group row mb-0">

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit"
                                            class="btn-block btn btn-xs btn-secondary edit-custom float-right mb-2">Edit
                                    </button>
                                    <a href="{{route('users.index')}}" class="btn btn-xs btn-secondary show-custom">Users
                                        List</a>
                                    <a href="{{route('users.show',$user->id)}}"
                                       class="btn btn-xs btn-secondary show-custom float-right ml-1">Show</a>
                                    <a href="{{route('blockUser',$user->id)}}"
                                       class="btn btn-xs btn-secondary block-custom float-right">{{blockStr($user->id)}}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
