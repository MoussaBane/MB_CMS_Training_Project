@extends('backend.login_layout')
@section('title', 'Login')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('admin.login') }}"><b>MB</b>CMS_T</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">
            <h2 align="center"><b>Login</b></h2>
            </p>
            <p class="login-box-msg"><b>Sign in to start your session</b></p>

            @if (session()->has('error'))
                <br>
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                <br>
            @endif
            @if (session()->has('success'))
                <br>
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                <br>
            @endif
            <form action="{{ route('admin.authentication') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email"
                        value="{{ old('email') }}" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember_me" value="{{ old('remember_me') ? 'checked' : '' }}">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <br>
                <p>--- <b>OR</b> ---</p>
                <br>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>
                    Sign in using
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>
                    Sign in using
                    Google+</a>
            </div>
            <!-- /.social-auth-links -->

            <a href="#"><b>I forgot my password</b></a><br>
            <a href="{{ route('admin.register') }}" class="text-center"><b>Register a new membership</b></a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
@endsection
