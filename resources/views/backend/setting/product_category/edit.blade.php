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
                <form action="{{ route('update-product-category', $product_category->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="product_category_name"> Name</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name', $product_category->name  ?? '') }}" id="product_category_name"
                                required>
                            @error('name')
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
