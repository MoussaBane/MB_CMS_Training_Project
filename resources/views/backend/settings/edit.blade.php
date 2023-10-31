@extends('backend.layout')
@section('title', 'Edit Setting')


@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Settings
                </h3>

            </div>
            <div class="box-body">
                {{-- {{ $settings->settings_value }} --}}
                <form action="{{ route('settings.update', ['id' => $settings->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="description">Description</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" readonly type="text"
                                    value="{{ $settings->settings_description }}" name="settings_description" required>
                            </div>
                        </div>
                    </div>
                    @if ($settings->settings_type == 'file')
                        <div class="form-group">
                            <label {{-- for="logo/icon" --}}for="settings_value">Select The Image</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input class="form-control" type="file" name="settings_value" required>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="text">Content</label>
                        <div class="row">
                            <div class="col-xs-12">
                                @if ($settings->settings_type == 'text')
                                    <input class="form-control" type="text" name="settings_value" required
                                        value="{{ $settings->settings_value }}">
                                @endif
                                @if ($settings->settings_type == 'textarea')
                                    <textarea name="settings_value" class="form-control" required>{{ $settings->settings_value }}</textarea>
                                @endif
                                @if ($settings->settings_type == 'ckeditor')
                                    <textarea class="form-control" name="settings_value" id="editor1" required>{{ $settings->settings_value }}</textarea>
                                @endif
                                @if ($settings->settings_type == 'file')
                                    <img width=150 src="/images/settings/{{ $settings->settings_value }}" alt="image">
                                @endif
                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>
                            </div>
                        </div>
                        @if ($settings->settings_type == 'file')
                            <input type="hidden" name="old_file" value="{{ $settings->settings_value }}">
                        @endif
                        <div align="right" class="box-footer">
                            <button class=" btn btn-primary" type="submit"><b>Save</b></button>
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
