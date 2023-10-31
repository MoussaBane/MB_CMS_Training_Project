@extends('backend.layout')
@section('title', 'Edit Page')


@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Edit The Selected Page
                </h3>

            </div>
            <div class="box-body">
                <form action="{{ route('page.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @isset($page->page_file)
                        <div class="form-group">
                            <label for="page_file">The Current Image</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img width=150 height=150 src="/images/page/{{ $page->page_file }}" alt="image">
                                </div>
                            </div>
                        </div>
                    @endisset
                    <div class="form-group">
                        <label for="page_file">Select The Image</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="page_file" value="{{ $page->page_file }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="page_title">Title</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="page_title" value="{{ $page->page_title }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="page_slug">Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="page_slug" value="{{ $page->page_slug }}"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="page_content">Content</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" name="page_content" id="editor1" required>{{ $page->page_content }}</textarea>
                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="page_content">Status</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="page_status" class="form-control" required>
                                    <option value="-1">Select</option>
                                    <option {{ $page->page_status == '1' ? "selected=''" : '' }} value="1">Active
                                    </option>
                                    <option {{ $page->page_status == '0' ? "selected=''" : '' }} value="0">Passive
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">

                        <input type="hidden" name="old_file" value="{{ $page->page_file }}">

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
