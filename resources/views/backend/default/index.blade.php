@extends('backend.layout')
@php
    use Carbon\CarbonInterface;
@endphp
@section('title', 'Admin Home Page')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <b>Dashboard</b>
                </h3>

            </div>
        </div>
    </section>
    <div class="row">
        <div class=" col-lg-1"></div>
        <div class=" col-lg-10 justify-content-center">
            <div class="box box-success">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="fa fa-comments-o"></i>

                    <h3 class="box-title"><b>Chat</b></h3>

                    <div class="box-tools pull-right" data-toggle="tooltip" title="" data-original-title="Status">
                        <div class="btn-group" data-toggle="btn-toggle">
                            <a href="{{ route('admin') . '/messageList/all' }}"
                                class="btn btn-default btn-sm  {{ request()->is('admin/messageList/all') || request()->is('admin') ? 'active' : '' }}">
                                <i class="fa fa-square text-blue"></i>

                            </a>
                            <a href="{{ route('admin') . '/messageList/unreaded' }}"
                                class="btn btn-default btn-sm {{ request()->is('admin/messageList/unreaded') ? 'active' : '' }}">
                                <i class="fa fa-square text-green"></i>
                            </a>
                            <a href="{{ route('admin') . '/messageList/readed' }}"
                                class="btn btn-default btn-sm {{ request()->is('admin/messageList/readed') ? 'active' : '' }}">
                                <i class="fa fa-square text-red "></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: auto;">
                    <div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: auto;">
                        <!-- chat item -->
                        @foreach ($messages as $message)
                            <div class="item">
                                <img src="/images/messages/message_avatar.jpeg" alt="user image"
                                    class="{{ $message->status == 1 ? 'online' : 'offline' }}">

                                <p class="message">
                                    <a href="{{ route('admin') . '/message/' . $message->id }}" class="name">
                                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i>
                                            {{ $message->created_at->diffForHumans() }}</small>
                                        {{-- {{ $message->created_at->diffForHumans(now(), CarbonInterface::DIFF_RELATIVE_AUTO) }} --}}
                                        <b>{{ $message->full_name }}</b>
                                        <br>
                                        <small>{{ $message->from }}</small>
                                    </a>

                                    {{ $message->subject }}
                                    <br>
                                    {{ $message->message }}
                                </p>
                            </div>
                        @endforeach
                        <!-- /.item -->
                    </div>
                </div>
                <!-- /.chat -->

            </div>
        </div>
    </div>


    {{-- message --}}

    <div class="row">
        <div class=" col-lg-1"></div>
        <div class=" col-lg-10">
            <div class="box box-info">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="fa fa-envelope"></i>

                    <h3 class="box-title"><b>Quick Email</b></h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                            title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <form action="#" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name="" cols="100%" rows=" auto" class="form-control" placeholder="Message"></textarea>
                        </div>

                        <div class="box-footer clearfix form-group">
                            <a href="#" type="submit" class="pull-right btn btn-default form-control">
                                Send <i class="fa fa-arrow-circle-right"></i></button>
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('css')
@endsection

@section('js')
@endsection
