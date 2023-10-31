@extends('backend.layout')
@section('title', 'Settings')


@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Settings
                </h3>

            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Description</th>
                            <th scope="col">Content</th>
                            <th scope="col">Key Word</th>
                            <th scope="col">Type</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="sortable">

                        @foreach ($data['adminSettings'] as $adminSettings)
                            <tr id="item-{{ $adminSettings->id }}">
                                <td scope="row">{{ $adminSettings->id }}</td>
                                <td class="sortable">{{ $adminSettings->settings_description }}</td>
                                <td>
                                    @if ($adminSettings->settings_type == 'file')
                                        <img width=150 src="/images/settings/{{ $adminSettings->settings_value }}"
                                            alt="image">
                                    @else
                                        {{ $adminSettings->settings_value }}
                                    @endif
                                </td>
                                <td>{{ $adminSettings->settings_key }}</td>
                                <td>{{ $adminSettings->settings_type }}</td>
                                <td width=6>
                                    {{-- <a href="Javascript:void(0)">
                                        <i class="fa fa-pencil-square"></i>
                                    </a> --}}
                                    <a href="{{ route('settings.edit', ['id' => $adminSettings->id]) }}">
                                        <i class="fa fa-pencil-square"></i>
                                    </a>
                                </td>
                                <td width=6>
                                    @if ($adminSettings->settings_delete)
                                        <a href="Javascript:void(0)">
                                            <i id="{{ $adminSettings->id }}" class="fa fa-trash-o"></i>
                                        </a>
                                    @endif
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
                        url: "{{ route('settings.sortable') }}",
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

                    location.href = '/admin/settings/delete/' + destroy_id;
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
