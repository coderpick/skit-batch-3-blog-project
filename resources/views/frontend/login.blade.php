@extends('layouts.frontend.master')
@section('content')
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Sign in</h4>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    {{--                    <a href="#" class="btn btn-facebook btn-block mb-2 text-white"> <i class="fa fa-facebook"></i> &nbsp; Sign--}}
                    {{--                        in--}}
                    {{--                        with--}}
                    {{--                        Facebook</a>--}}
                    {{--                    <a href="#" class="btn btn-primary btn-block mb-4"> <i class="fa fa-google"></i> &nbsp; Sign in with--}}
                    {{--                        Google</a>--}}

                    <div class="form-group">
                        <input name="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email" type="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <input class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" type="password">
                    </div> <!-- form-group// -->
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group">
                        <a href="#" class="float-right">Forgot password?</a>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div> <!-- form-group form-check .// -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Login </button>
                    </div> <!-- form-group// -->
                </form>
            </div> <!-- card-body.// -->
        </div> <!-- card .// -->
        <p class="text-center mt-4">Don't have account? <a href="#">Sign up</a></p>
    </div>

@endsection
