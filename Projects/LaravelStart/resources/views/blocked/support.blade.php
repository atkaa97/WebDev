@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Support</div>
                    <div class="card-body">
                        @if (session('sendEmail'))
                            <div class="alert alert-success" role="alert">
                                {{ session('sendEmail') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
                            <!--Section description-->
                            <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not
                                hesitate to contact us directly. Our team will come back to you within
                                a matter of hours to help you.</p>

                                <div class="form-group row">
                                    <label for="textarea"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="textarea"
                                                  class="form-control{{ $errors->has('textarea') ? ' is-invalid' : '' }}"
                                                  name="textarea" required>
                                        {{ old('textarea') }}
                                        </textarea>
                                        @if ($errors->has('textarea'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('textarea') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            <div class="text-center mt-5">
                                <a href="{{route('sendMail')}}" class="btn btn-primary btn-bg">Send Mail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
