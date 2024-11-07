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
                    <h1>Company</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Company</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Add Company<small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.company.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name"> Company Name <span class="req">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name') }}" id="name" required>
                                            @error('name')
                                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="email"> Company Email</label>
                                            <input type="text" class="form-control" name="email"
                                                value="{{ old('email') }}" id="email">
                                            @error('email')
                                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="address"> Company Address</label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ old('address') }}" id="address">
                                            @error('address')
                                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="number"> Company Number</label>
                                            <input type="text" class="form-control" name="number"
                                                value="{{ old('number') }}" id="number">
                                            @error('number')
                                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="time"> Company Timing</label>
                                            <input type="text" class="form-control" name="time"
                                                value="{{ old('time') }}" id="time">
                                            @error('time')
                                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">

                                    </div>
                                </div>

                                {{-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="forBannerImg">Banner Image</label>&nbsp;&nbsp;&nbsp;
                                            <input type="file" name="banner_image" accept="image/*" id="forBannerImg">
                                        </div>
                                        <span>(<b>Note:</b>Width at least 900px and height 350px)</span>
                                        @error('banner_image')
                                            <br>
                                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="row" style="margin: 20px 0px;">
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload Banner Images</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="banner" class="custom-file-input c-field-req"
                                                    id="inputGroupFile01" multiple="">
                                                <label class="custom-file-label" for="inputGroupFile01">Upload Banner Images</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload Logo Images</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="logo" class="custom-file-input c-field-req"
                                                    id="inputGroupFile01" multiple="">
                                                <label class="custom-file-label" for="inputGroupFile01">Upload Logo Images</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="summernote_1" name="description" style="height: 300px;" required>
                                                {{ old('description') }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="row">
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">Upload Icon Image</span>
                                                </div>
                                                <div class="custom-file">
                                                <input type="file" name="icon" class="custom-file-input c-field-req" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Upload Icon</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">Upload Background Image</span>
                                                </div>
                                                <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input c-field-req" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Upload Image</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        </div>
                                    </div> --}}

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
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
        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>

@endpush
