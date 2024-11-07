@extends('backend.layouts.master')

@section('content')

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">

            <!-- form start -->
            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create Blog</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">

                        <div class="form-group">
                            <label for="heading">Heading</label>
                            <input type="text" name="heading" value="{{ old('heading') }}"  class="form-control" id="heading" placeholder="Enter Heading" required>
                        </div>
                        @error('heading')
                            <span class="alert alert-danger custom-alert-d"> {{ $message }} </span>
                        @enderror

                        <div class="form-group">
                            <label for="exampleInputFile">Upload Thumbnail Image <span style="font-weight: 500;">(<b>Note:</b> &nbsp; Height at least 250px and width 900px)</span></label>&nbsp;&nbsp;&nbsp;
                            <input type="file" name="thumbnail_image" accept="image/*" id="exampleInputFile" required>
                        </div>


                        @error('thumbnail_image')
                            <span class="alert alert-danger custom-alert-d"> {{ $message }} </span>
                        @enderror


                        <div class="form-group">
                            <label for="heading">Image Alt Tag</label>
                            <input type="text" name="image_alt_tag" value="{{ old('image_alt_tag') }}"  class="form-control" id="image_alt_tag" placeholder="Enter Image Alt Tag" required>
                        </div>

                        @error('image_alt_tag')
                            <span class="alert alert-danger custom-alert-d"> {{ $message }} </span>
                        @enderror

                        <div class="form-group">
                            <label>Select Author</label>
                            <select class="form-control" name="user_id" id="author"  required>
                                <option value="">Select</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('user_id')
                            <span class="alert alert-danger custom-alert-d"> {{ $message }} </span>
                        @enderror

                        <div class="form-group">
                            <label>Blog Detail</label>
                            <textarea id="editor1" name="blog_detail" rows="16" cols="80" required>
                                {{ old('blog_detail') }}
                            </textarea>
                        </div>

                        @error('blog_detail')
                            <span class="alert alert-danger custom-alert-d"> {{ $message }} </span>
                        @enderror

                        <div class="form-group">
                            <div class="material-switch">
                                <input id="blogStatus" name="status" type="checkbox"/>
                                <label for="blogStatus" class="label-default"> Blog Publish/Draft</label>
                            </div>
                        </div>

                        @error('status')
                            <span class="alert alert-danger custom-alert-d"> {{ $message }} </span>
                        @enderror

                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->


                <div class="box box-primary">
                    <div class="box-header with-border" style="background-color: #3c8dbc; color: white;">
                        <h3 class="box-title">Seo Setting</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="heading">Seo Title</label>
                            <input type="text" name="seo_title" value="{{ old('seo_title') }}"  class="form-control" id="seo_title" placeholder="Enter Seo Title">
                        </div>
                        @error('seo_title')
                        <br>
                        <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                        @enderror

                        <div class="form-group">
                            <label for="seo_description">Seo Description</label><br>
                            <textarea name="seo_description" rows="5" cols="80" style="width: 100%;">
                                {{ old('seo_description') }}
                            </textarea>
                        </div>
                    </div>
                </div>

                <div class="pull-right">
                    <div class="">
                        <button type="submit" class="btn btn-primary" style="padding: 15px 60px;">Save</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
    <!-- /.row -->

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
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })

</script>

@endpush
