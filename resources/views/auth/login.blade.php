@extends('layouts.app_landing')

@section('content')

<div class="card border-grey border-lighten-3 m-0">
    <div class="card-header border-0">
        <div class="card-title text-center">
            <div class="p-1"><img src="{{asset('app-assets/images/logo/stack-logo-dark.png')}}" alt="branding logo"></div>
        </div>
        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Easily
                Using</span></h6>
    </div>
    <div class="card-content">
        <div class="card-body pt-0">
            <form class="form-horizontal" action="{{route('login')}}" method="post">
                @csrf
                <fieldset class="form-group floating-label-form-group">
                    <label for="email">Your Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Your Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </fieldset>
                <fieldset class="form-group floating-label-form-group mb-1">
                    <label for="password">Enter Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" minlength="6" id="password" name="password" placeholder="Enter Password">
                </fieldset>
                <div class="form-group row">
                    <div class="col-sm-6 col-12 text-center text-sm-left">
                        <fieldset>
                            <input type="checkbox" id="remember-me" class="chk-remember">
                            <label for="remember-me"> Remember Me</label>
                        </fieldset>
                    </div>
                    <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div>
                </div>
                <button type="submit" class="btn btn-outline-primary btn-block"><i class="feather icon-unlock"></i> Login</button>
            </form>
        </div>
        <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>New to
                Stack ?</span></p>
        <div class="card-body">
            <a href="{{route('register')}}" class="btn btn-outline-danger btn-block"><i class="feather icon-user"></i> Register</a>
        </div>
    </div>
</div>

@endsection
