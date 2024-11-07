@extends('backend.layouts.master')
@push('header')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
@endpush

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Portfolio</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Portfolio</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->

                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">

                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="title"> Title <span class="req">*</span></label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title', $portfolio->title) }}" id="title" required>
                                        @error('title')
                                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload Thumbnail Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="thumbnail_image"
                                                class="custom-file-input c-field-req" id="inputGroupFile01"
                                                >
                                            <label class="custom-file-label" for="inputGroupFile01">Choose
                                                Thumbnail Images</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload Document</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="document"
                                                class="custom-file-input c-field-req" id="inputGroupFile01"
                                                >
                                            <label class="custom-file-label" for="inputGroupFile01">Choose
                                                Document</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 mt-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="show_download_button" name="show_download_button" @if($portfolio->show_download_button)
                                        checked @endif>
                                        <label class="form-check-label" for="show_download_button">
                                            Show Download Button
                                        </label>
                                    </div>
                                </div>

                            </div>



                            {{-- Submit Button   --}}
                            <div class="card">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- /.card -->
                </div>

           </div>

        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection


@push('footer')
    <!-- Summernote -->
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script>
        $(function() {
            // Summernote
            $('#summernote_1').summernote({
                height: 300,
            });
        });

        // $('#product_category_id').on('change', function() {
        //     var category_id = $(this).find(":selected").val();

        //     if(category_id == '') {
        //         $('#product_sub_category_id').empty();
        //         $('#product_sub_category_id').append('<option value="">Select First Category</option>')
        //     }else{

        //         $.ajax({
        //             url: "{{ url('/admin/sub-categories') . '/' }}" + category_id,
        //             type: 'get',
        //             dataType: 'json',
        //             success: function(response){

        //                 console.log(response);
        //                 $('#product_sub_category_id').empty();
        //                 $.each(response,function(index,row){
        //                     console.log(row.name);
        //                     $('#product_sub_category_id').append('<option value="'+row.id+'">'+row.name+'</option>')
        //                 })

        //             }
        //         });
        //     }

        // });
    </script>
@endpush
