@extends('backend.login_layout')
@section('title', 'Register')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('admin.register') }}"><b>MB</b>CMS_T</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">
            <h2 align="center"><b>Register</b></h2>
            </p>
            <p class="login-box-msg"><b>Register a new membership</b></p>

            @if (session()->has('error'))
                <br>
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                <br>
            @endif
            <form action="{{ route('admin.saveRegistration') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Name Lastname" name="name"
                        value="{{ old('name') }}" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email"
                        value="{{ old('email') }}" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password"
                        autocomplete="new-password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password Confirmation"
                        name="password_confirmation" autocomplete="new-password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-8"></div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat"><b>Create</b></button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="{{ route('admin.login') }}" class="text-center"><b>Already have a membership ? Login</b></a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
@endsection
