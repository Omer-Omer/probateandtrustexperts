@extends('backend.layouts.master')
@push('header')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
@endpush

@section('content')

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Product</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('page.updateProductPage', $product->section_type) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card card-primary card-outline card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                                                 </div>

                        <div class="card-body">
                            {{-- General Tab Content --}}
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Product Category</label>
                                        <select class="form-control" name="product_category_id" id="product_category_id"  required disabled>
                                        <option value="">Select Product Category</option>
                                        @forelse ($productCategories as $cat)
                                            <option value="{{ $cat->id }}" @if(old('product_category_id', $product->section_type) == $cat->id) selected @endif>{{ $cat->name }}</option>
                                        @empty

                                        @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea id="summernote_1" name="description">
                                            {{ old('description', $product->section_description) }}
                                        </textarea>

                                        @error('address')
                                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="forThumbnailImg">Background Image</label>&nbsp;&nbsp;&nbsp;
                                        <input type="file" name="thumbnail_img" accept="image/*" id="forThumbnailImg">
                                    </div>
                                    <span>(<b>Note:</b>Width at least 250px and height 350px)</span>


                                    @error('thumbnail_img')
                                    <br>
                                        <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    @if(isset($product->section_images))
                                        <div class="col-md-6 d-flex">
                                            <img height="100px" src="{{ asset('/').$product->section_images }}">
                                            {{-- <a href="{{ route('delete-thumbnail-img', $product->id) }}"><i class="fa fa-fw fa-trash"></i></a> --}}
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                    {{-- Submit Button   --}}
                    <div class="card">
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
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
<!-- Summernote -->
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>

    $(function () {
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
    //             url: "{{ url('/admin/sub-categories').'/' }}" + category_id,
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
