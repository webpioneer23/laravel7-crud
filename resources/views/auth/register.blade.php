@extends('layouts.app_landing')

@section('content')
<div class="card border-grey border-lighten-3 px-1 py-1 m-0">
    <div class="card-header border-0 pb-0">
        <div class="card-title text-center">
            <img src="{{asset('app-assets/images/logo/stack-logo-dark.png')}}" alt="branding logo">
        </div>
        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Easily
                Using</span></h6>
    </div>
    <div class="card-content">
        
        <div class="card-body pt-0">
            <form class="form-horizontal" method="POST" action="{{route('register')}}">
                @csrf
                <fieldset class="form-group floating-label-form-group">
                    <label for="user-name">User Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="User Name">
                </fieldset>
                <fieldset class="form-group floating-label-form-group">
                    <label for="user-email">Your Email Address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Your Email Address">
                </fieldset>
                <fieldset class="form-group floating-label-form-group mb-1">
                    <label for="user-password">Enter Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" minlength="6" id="password" name="password" placeholder="Enter Password">
                </fieldset>
                <fieldset class="form-group floating-label-form-group mb-1">
                    <label for="password-confirm">Enter Password Confirm</label>
                    <input type="password" id="password-confirm" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Enter Password Confirm">
                </fieldset>
                <div class="form-group row">
                    <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                        <fieldset>
                            <input type="checkbox" id="remember-me" class="chk-remember">
                            <label for="remember-me"> Remember Me</label>
                        </fieldset>
                    </div>
                    <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div>
                </div>
                <button type="submit" class="btn btn-outline-primary btn-block"><i class="feather icon-user"></i> Register</button>
            </form>
        </div>
        <div class="card-body pt-0">
            <a href="{{route('login')}}" class="btn btn-outline-danger btn-block"><i class="feather icon-unlock"></i> Login</a>
        </div>
    </div>
</div>

@endsection
