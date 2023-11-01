@extends('frontend.layout')
@section('title', 'Blog Detail')
@section('content')
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3 mb-4 text-color"><b>{{ $blog->blog_title }}</b></h1>

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <div class=" card ">
                    <div class=" card-body">
                        <!-- Preview Image -->
                        <img class="img-fluid rounded w-100 h-50" src="/images/blogs/{{ $blog->blog_file }}" alt="image">
                    </div>
                </div>

                <br>

                <div class="card my-lg-auto">
                    <div class=" card-body">
                        <hr class="mt-0 mb-3">

                        <!-- Date/Time -->
                        <p>Posted on {{ $blog->created_at->format('d/m/y  h:i') }}</p>

                        <hr class="mt-2 mb-2">

                        <p>


                            {!! $blog->blog_content !!}

                        </p>
                    </div>
                </div>
            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-lg-4">

                <!-- Side Widget -->
                <div class="card">
                    <div class="card-body">
                        <h3 align='center'><b>Other Blogs</b></h3>
                        <hr>
                        <ul class="list-group">
                            @foreach ($blog_list as $blog_item)
                                <a href="{{ route('f_blog.detail', $blog_item->blog_slug) }}">
                                    <li class="list-group-item list-group-item-action  text-lg-center">
                                        {{ $blog_item->blog_title }}</li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>

        </div>
        <br><br>
        <!-- /.row -->

    </div>

@endsection

@section('css')
@endsection
@section('js')
@endsection
