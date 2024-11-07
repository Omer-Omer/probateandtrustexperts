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
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <form action="{{ route('page.storeProductPage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-primary card-outline card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            {{-- <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-three-general-tab" data-toggle="pill" href="#custom-tabs-three-general" role="tab" aria-controls="custom-tabs-three-general" aria-selected="true">General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-seo-tab" data-toggle="pill" href="#custom-tabs-three-seo" role="tab" aria-controls="custom-tabs-three-seo" aria-selected="false">Seo</a>
                                </li>
                            </ul> --}}
                        </div>

                        <div class="card-body">
                            {{-- General Tab Content --}}
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Product Category</label>
                                        <select class="form-control" name="product_category_id" id="product_category_id"  required>
                                        <option value="">Select Product Category</option>
                                        @forelse ($product_categories as $product)

                                        <option value="{{ $product->id }}" @if(old('product_category_id') == $product->id) selected @endif>{{ $product->name }}</option>
                                        @empty

                                        @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label>Description</label>
                                        <textarea id="summernote_1" name="description">
                                            {{ old('description') }}
                                        </textarea>

                                        @error('address')
                                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="forThumbnailImg">Background Image</label>&nbsp;&nbsp;&nbsp;
                                        <input type="file" name="image" accept="image/*" id="forThumbnailImg">
                                    </div>
                                    <span>(<b>Note:</b>Width at least 250px and height 350px)</span>


                                    @error('image')
                                    <br>
                                        <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                    @enderror
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

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
