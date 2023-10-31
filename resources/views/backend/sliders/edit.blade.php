@extends('backend.layout')
@section('title', 'Edit Slider')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Edit The Selected Slider
                </h3>

            </div>
            <div class="box-body">
                <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @isset($slider->slider_file)
                        <div class="form-group">
                            <label for="slider_file">The Current Image</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img width=150 height=150 src="/images/sliders/{{ $slider->slider_file }}" alt="image">
                                </div>
                            </div>
                        </div>
                    @endisset
                    <div class="form-group">
                        <label for="slider_file">Select The Image</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="slider_file"
                                    value="{{ $slider->slider_file }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slider_title">Title</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="slider_title"
                                    value="{{ $slider->slider_title }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slider_slug">Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="slider_slug"
                                    value="{{ $slider->slider_slug }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slider_url">URL</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="url" name="slider_url"
                                    value="{{ $slider->slider_url }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slider_content">Content</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" name="slider_content" id="editor1" required>{{ $slider->slider_content }}</textarea>
                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slider_content">Status</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="slider_status" class="form-control" required>
                                    <option value="-1">Select</option>
                                    <option {{ $slider->slider_status == '1' ? "selected=''" : '' }} value="1">Active
                                    </option>
                                    <option {{ $slider->slider_status == '0' ? "selected=''" : '' }} value="0">Passive
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">

                        <input type="hidden" name="old_file" value="{{ $slider->slider_file }}">

                        <div align="right" class="box-footer">
                            <button class=" btn btn-primary" type="submit"><b>Update</b></button>
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
