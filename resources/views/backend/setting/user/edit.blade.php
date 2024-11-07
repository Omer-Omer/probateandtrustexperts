@extends('backend.layouts.master')

@section('content')

<!-- Main content -->
<section class="content">

    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Company</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('update-user', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    <div class="box-body">

                        <div class="form-group">
                            <label for="profileImage"> Profile Image </label>
                            <input type="file" class="form-control" name="profile_image" id="profileImage">

                            <span>(<b>Note:</b>Height at least 200px and width 200px)</span>
                            @error('profile_image')
                            <span class="alert alert-danger custom-alert-d"> {{ $message }} </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="name"> Name</label>
                            <input type="text" class="form-control" name="name"
                                   value="{{ old('name', $user->name  ?? '') }}" id="name" required>
                            @error('name')
                            <span class="alert alert-danger custom-alert-d"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="userEmail"> Email</label>
                            <input type="text" class="form-control" name="email"
                                   value="{{ old('email', $user->email  ?? '') }}" id="userEmail">
                            @error('email')
                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3"  name="description" placeholder="Enter Description">
                                {{ old('description', $user->description  ?? '') }}
                            </textarea>
                            @error('description')
                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                            @enderror
                        </div>


                    </div>

                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->



        </div>

        <div class="col-md-4">
            @if(isset($user->profile_image))
                <img style="height: 200px;" class="img-fluid" src="{{ asset('/').$user->profile_image }}">
            @else
                <p>Profile Image Not Found</p>
            @endif
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
