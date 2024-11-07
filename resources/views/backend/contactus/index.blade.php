@extends('backend.layouts.master')
@push('header')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/codemirror/theme/monokai.css') }}">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/simplemde/simplemde.min.css') }}">
@endpush
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contact Us</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contact Us</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <form action="{{ route('page.contactus.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Section One --}}
                        <section class="content">
                            <div class="container-fluid">
                            <!-- SELECT2 EXAMPLE -->
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Contact Us</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                    {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                    </button> --}}
                                </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: block;">

                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label>Description</label>
                                                <textarea id="summernote_1" name="description">
                                                        {{ old('description', $page->description ?? '') }}
                                                </textarea>

                                                @error('description')
                                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }}
                                                        </span>
                                                @enderror
                                            </div>
                                        </div>

                                </div>
                                <!-- /.card-body -->

                            </div>
                            <!-- /.card -->
                        </section>

                        {{-- SEO --}}
                        <section class="content">
                            <div class="container-fluid">
                            <!-- SELECT2 EXAMPLE -->
                            <div class="card card-default">
                                <div class="card-header">
                                <h3 class="card-title">SEO</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                    {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                    </button> --}}
                                </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: block;">
                                    <div class="col-12">
                                        <div class="form-group">
                                            {{-- <label for="seo_title">Section Heading</label> --}}
                                            <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title', $seo->meta_title ?? '') }}" id="seo_title" placeholder="SEO Title">
                                            @error('seo_title')
                                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="sec_description">Seo Description</label>
                                            <textarea class="form-control" name="seo_description" rows="3" placeholder="Enter Seo Description ....">
                                                {{ old('seo_description', $seo->meta_description ?? '' ) }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                            </div>
                            <!-- /.card -->
                        </section>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection


@push('footer')
<!-- Summernote -->
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- CodeMirror -->
<script src="{{ asset('backend/plugins/codemirror/codemirror.js') }}"></script>
<script src="{{ asset('backend/plugins/codemirror/mode/css/css.js') }}"></script>
<script src="{{ asset('backend/plugins/codemirror/mode/xml/xml.js') }}"></script>
<script src="{{ asset('backend/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>

<script>
    $(function () {
        // Summernote
        $('#summernote_1').summernote({
            height: 300,
        });
        // Summernote
        $('#summernote_2').summernote({
            height: 300,
        });
        // Summernote
        $('#summernote_3').summernote({
            height: 300,
        });
        // Summernote
        $('#summernote_4').summernote({
            height: 300,
        });

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>

@endpush
