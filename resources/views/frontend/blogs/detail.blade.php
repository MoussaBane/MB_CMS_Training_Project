@extends('frontend.layout')
@section('title', 'Blog Detail')
@section('content')
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3 mb-4">{{ $blog->blog_title }}</h1>

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Preview Image -->
                <img class="img-fluid rounded w-100 h-50" src="/images/blogs/{{ $blog->blog_file }}" alt="image">

                <hr class="mt-4 mb-4">

                <!-- Date/Time -->
                <p>Posted on {{ $blog->created_at->format('d/m/y  h:i') }}</p>

                <hr class="mt-4 mb-4">

                <p>
                    {!! $blog->blog_content !!}
                </p>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Other Blogs</h5>
                    <div class="card-body">
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
        <!-- /.row -->

    </div>

@endsection

@section('css')
@endsection
@section('js')
@endsection
