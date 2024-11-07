@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 mt-5 mb-5">

                    <h3 class="text-center"> Login </h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group has-feedback mt-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback mt-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="row mt-3">
                            <div class="col-xs-4 text-center">
                                <button style="width: 50%; border:0px;" type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
    </div>
@endsection
