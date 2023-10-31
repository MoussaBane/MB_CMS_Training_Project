@extends('backend.layout')
@section('title', 'Blogs')


@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Blogs
                </h3>

                <div align="right">
                    <a href="{{ route('blog.create') }}"> <button class="btn btn-success"><b>Add</b></button></a>
                </div>

            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="sortable">

                        @foreach ($data['blog'] as $blog)
                            <tr id="item-{{ $blog->id }}">
                                <td scope="row" class="sortable">{{ $blog->blog_title }}</td>
                                <td width=6>
                                    {{-- <a href="Javascript:void(0)">
                                        <i class="fa fa-pencil-square"></i>
                                    </a> --}}
                                    <a href="{{ route('blog.edit', $blog->id) }}">
                                        <i class="fa fa-pencil-square"></i>
                                    </a>
                                </td>
                                <td width=6>
                                    <a href="Javascript:void(0)">
                                        <i id="{{ $blog->id }}" class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </section>

    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                /* for getting the csrf value */
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#sortable').sortable({
                revert: true,
                handle: ".sortable",
                stop: function(event, ui) {
                    var data = $(this).sortable('serialize');
                    $.ajax({
                        type: "POST",
                        data: data,
                        url: "{{ route('blogs.sortable') }}",
                        success: function(msg) {
                            /*
                            console.log(msg); // for the test
                            */
                            if (msg) {
                                alertify.success(
                                    "<strong> Openration Successful !!!</strong>");
                            } else {
                                alertify.error("<strong> Openration Failed !!!</strong>");
                            }
                        }
                    });
                }
            });

            $('#sortable').disableSelection();

        });



        $(".fa-trash-o").click(function() {
            destroy_id = $(this).attr('id');

            alertify.confirm('Are you sure you want to delete this item?',
                'This item is gonna be deleted forever...',
                function() {

                    /* location.href = '/admin/settings/delete/' + destroy_id; */
                    $.ajax({
                        type: "DELETE",
                        url: "blog/" + destroy_id,
                        success: function(msg) {
                            if (msg) {
                                $("#item-" + destroy_id).remove();
                                alertify.success('Deleted successfully');
                            } else {
                                alertify.error('Something went wrong while deleting this item !!!');
                            }
                        }

                    });
                },
                function() {
                    alertify.error('Delete actiion cancelled !');
                }

            );
        });
    </script>
@endsection

@section('css')
@endsection

@section('js')
@endsection
