@extends('backend.layout')
@section('title', 'Create Blog')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Add A New Blog
                </h3>

            </div>
            <div class="box-body">
                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="blog_file">Select The Image</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="blog_file" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="blog_title">Title</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="blog_title" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="blog_slug">Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="blog_slug" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="blog_content">Content</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" name="blog_content" id="editor1" required></textarea>
                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="blog_content">Status</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="blog_status" class="form-control" required>
                                    <option value="-1">Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Passive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">

                        <input type="hidden" name="old_file">

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
