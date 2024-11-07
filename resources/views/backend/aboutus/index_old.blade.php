@extends('backend.layouts.master')

@section('content')

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="c-m-0">About Us</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Section One --}}
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Section One</h3>
                </div>

                <form action="{{ route('admin.about-us.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="section_type" value="section_one">

                    <div class="box-body">

                        <div class="form-group">
                            <label for="banner_image_text">Banner Image Text</label>
                            <input type="text" class="form-control" name="banner_image_text" value="{{ old('banner_image_text', $section_one->image_text  ?? '') }}" id="banner_image_text" placeholder="Banner Image Text" required>
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="exampleInputFile">Upload Banner Image</label>&nbsp;&nbsp;&nbsp;
                            <input type="file" name="banner_image" accept="image/*" id="exampleInputFile" @if (isset($section_one) && isset($section_one->image)) @else required @endif>
                        </div>
                        <span>(<b>Note:</b>Height at least 250px and width 900px)</span>

                        @error('banner_image')
                        <br>
                        <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                        @enderror



                    </div>



                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">Save</button>
                    </div>
                </form>
                {{-- <form method="post" action="{{ route('slider-image-upload') }}" enctype="multipart/form-data"
                class="dropzone" id="dropzone">
                    @csrf
                    <input type="file" accept="image/*" />
                </form> --}}
            </div>
        </div>

        {{-- Preview Slider --}}
        <div class="col-md-6">
            <div class="row c-mt-3">
                @if(isset($section_one))
                    <div class="col-md-4">
                        <img height="100" width="300" src="{{ asset('/').$section_one->image }}">
                    </div>
                @else
                    <div class="col-12">
                        <p>Image Not Found</p>
                    </div>
                @endif
            </div>
        </div>

    </div>

    {{-- Section Seven --}}
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Section Seven </h3>
                </div>

                <form action="{{ route('admin.about-us.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="section_type" value="section_seven">

                    <div class="box-body">
                        <textarea id="editor9" name="description" rows="10" cols="80">
                                {{ $section_seven->description ?? '' }}
                        </textarea>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- Section Two --}}
    <div class="row">

        {{-- Left --}}
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Section Two Left Side
                        {{-- <small>Advanced and full of features</small> --}}
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form action="{{ route('admin.about-us.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="section_type" value="section_two_left">
                        <textarea id="editor1" name="section_two_left_description" rows="10" cols="80">
                                {{ $section_two_left->description ?? '' }}
                            </textarea>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        {{-- Right --}}
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Section Two Right Side
                        {{-- <small>Advanced and full of features</small> --}}
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form action="{{ route('admin.about-us.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="section_type" value="section_two_right">
                        <textarea id="editor2" name="section_two_right_description" rows="10" cols="80">
                                {{ $section_two_right->description ?? '' }}
                            </textarea>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>

    {{-- Section Three --}}
    <div class="row">
        {{-- Left --}}
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Section Three</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form action="{{ route('admin.about-us.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="section_type" value="section_three">
                        <textarea id="editor3" name="description" rows="10" cols="80">
                                {{ $section_three->description ?? '' }}
                        </textarea>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Section Four --}}
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Section Four </h3>
                </div>

                <form action="{{ route('admin.about-us.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="section_type" value="section_four">

                    <div class="box-body">

                        <div class="form-group">
                            <label for="exampleInputFile">Upload Image</label>&nbsp;&nbsp;&nbsp;
                            <input type="file" name="image" accept="image/*" id="exampleInputFile" required>
                        </div>
                        <span>(<b>Note:</b>Height at least 250px and width 400px)</span>

                        @error('image')
                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                        @enderror

                        <textarea id="editor4" name="description" rows="10" cols="80">
                                {{ $section_four->description ?? '' }}
                        </textarea>


                    </div>



                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">Save</button>
                    </div>
                </form>
                {{-- <form method="post" action="{{ route('slider-image-upload') }}" enctype="multipart/form-data"
                class="dropzone" id="dropzone">
                    @csrf
                    <input type="file" accept="image/*" />
                </form> --}}
            </div>
        </div>

        {{-- Preview Slider --}}
        <div class="col-md-6">
            <div class="row c-mt-3">
                @if(isset($section_four))
                    <div class="col-md-4">
                        <img height="100" width="300" src="{{ asset('/').$section_four->image }}">
                    </div>
                @else
                    <div class="col-12">
                        <p>Image Not Found</p>
                    </div>
                @endif
            </div>
        </div>

    </div>

    {{-- Section Five --}}
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Section Five </h3>
                </div>

                <form action="{{ route('admin.about-us.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="section_type" value="section_five">

                    <div class="box-body">


                        <textarea id="editor5" name="description" rows="10" cols="80">
                                {{ $section_five->description ?? '' }}
                        </textarea>


                        <div class="form-group">
                            <label for="exampleInputFile">Upload Image</label>&nbsp;&nbsp;&nbsp;
                            <input type="file" name="image" accept="image/*" id="exampleInputFile" required>
                        </div>
                        <span>(<b>Note:</b>Height at least 250px and width 400px)</span>

                        @error('image')
                        <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                        @enderror


                    </div>



                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">Save</button>
                    </div>
                </form>
                {{-- <form method="post" action="{{ route('slider-image-upload') }}" enctype="multipart/form-data"
                class="dropzone" id="dropzone">
                    @csrf
                    <input type="file" accept="image/*" />
                </form> --}}
            </div>
        </div>

        {{-- Preview Slider --}}
        <div class="col-md-6">
            <div class="row c-mt-3">
                @if(isset($section_five))
                    <div class="col-md-4">
                        <img height="300" width="300" src="{{ asset('/').$section_five->image }}">
                    </div>
                @else
                    <div class="col-12">
                        <p>Image Not Found</p>
                    </div>
                @endif
            </div>
        </div>

    </div>

    {{-- Section Six --}}
    <div class="row">
        {{-- One --}}
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Section Six One</h3>
                </div>

                <form action="{{ route('admin.about-us.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="section_type" value="section_six_one">

                    <div class="box-body">
                        <textarea id="editor6" name="description" rows="30" cols="80">
                                {{ $section_six_one->description ?? '' }}
                        </textarea>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">Save</button>
                    </div>
                </form>
                {{-- <form method="post" action="{{ route('slider-image-upload') }}" enctype="multipart/form-data"
                class="dropzone" id="dropzone">
                    @csrf
                    <input type="file" accept="image/*" />
                </form> --}}
            </div>
        </div>

        {{-- Two --}}
        <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Section Six Two</h3>
                    </div>

                    <form action="{{ route('admin.about-us.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="section_type" value="section_six_two">

                        <div class="box-body">
                            <textarea id="editor7" name="description" rows="30" cols="80">
                                    {{ $section_six_two->description ?? '' }}
                            </textarea>
                        </div>


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">Save</button>
                        </div>
                    </form>
                    {{-- <form method="post" action="{{ route('slider-image-upload') }}" enctype="multipart/form-data"
                    class="dropzone" id="dropzone">
                        @csrf
                        <input type="file" accept="image/*" />
                    </form> --}}
                </div>
            </div>

        {{-- Three --}}
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Section Six Three</h3>
                </div>

                <form action="{{ route('admin.about-us.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="section_type" value="section_six_three">

                    <div class="box-body">

                        <textarea id="editor8" name="description" rows="30" cols="80">
                                {{ $section_six_three->description ?? '' }}
                        </textarea>

                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">Save</button>
                    </div>
                </form>
                {{-- <form method="post" action="{{ route('slider-image-upload') }}" enctype="multipart/form-data"
                class="dropzone" id="dropzone">
                    @csrf
                    <input type="file" accept="image/*" />
                </form> --}}
            </div>
        </div>

    </div>


</section>
<!-- /.content -->

@endsection


@push('footer')
<!-- CK Editor -->
<script src="{{ asset('backend/bower_components/ckeditor/ckeditor.js') }}"></script>

<script type="text/javascript">
    Dropzone.options.dropzone = {
        maxFilesize: 12,
        renameFile: function (file) {
            var dt = new Date();
            var time = dt.getTime();
            return time + file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 5000,
        success: function (file, response) {
            console.log(response);
        },
        error: function (file, response) {
            return false;
        }
    };

</script>

<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        CKEDITOR.replace('editor4')
        CKEDITOR.replace('editor5')
        CKEDITOR.replace('editor6')
        CKEDITOR.replace('editor7')
        CKEDITOR.replace('editor8')
        CKEDITOR.replace('editor9')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })

    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor2')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })

    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor3')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })

</script>

@endpush
