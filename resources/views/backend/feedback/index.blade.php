@extends('backend.layouts.master')

@section('content')

<!-- Main content -->
<section class="content">

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Feedback</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('admin.feedback.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">

                        <div class="form-group">
                            <label for="termOfUseHeading">Heading</label>
                            <input type="text" name="heading" value="{{ old('heading', $feedback->heading ?? '') }}"  class="form-control" id="termOfUseHeading" placeholder="Enter Heading" required>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="6" name="description" placeholder="Enter Description" required>
                                {{ old('description', $feedback->description ?? '') }}
                            </textarea>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->



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
