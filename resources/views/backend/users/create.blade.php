@extends('backend.layout')
@section('title', 'Create User')


@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <b>Add A New User</b>
                </h3>

            </div>
            <div class="box-body">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="user_file">Select The Image</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="user_file" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Name LastName</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">UserName"Email"</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="password" name="password" class="form-control"
                                    placeholder="At Least 6 Characteres" autocomplete="new-password" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="At Least 6 Characteres" id="password-confirm" autocomplete="new-password"
                                    required>
                            </div>
                        </div>
                    </div>
                    {{-- @if ($user->role == 'admin')
                        <div class="form-group">
                            <label for="role">Role</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <select name="role" class="form-control" required>
                                        <option value="-1">Select</option>
                                        <option value="admin">Admin
                                        </option>
                                        <option value="user">User
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endif --}}
                    <div class="form-group">

                        {{-- <input type="hidden" name="old_file" value="{{ $user->user_file }}"> --}}

                        <div align="right" class="box-footer">
                            <button class=" btn btn-primary" type="submit"><b>Create</b></button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection

@section('css')
@endsection

@section('js')
@endsection
