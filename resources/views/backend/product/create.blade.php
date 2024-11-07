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
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-primary card-outline card-tabs">
                            <div class="card-header p-0 pt-1 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-three-general-tab" data-toggle="pill"
                                            href="#custom-tabs-three-general" role="tab"
                                            aria-controls="custom-tabs-three-general" aria-selected="true">General</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-gallery-tab" data-toggle="pill"
                                            href="#custom-tabs-three-gallery" role="tab"
                                            aria-controls="custom-tabs-three-gallery" aria-selected="true">Gallery</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-seo-tab" data-toggle="pill"
                                            href="#custom-tabs-three-seo" role="tab"
                                            aria-controls="custom-tabs-three-seo" aria-selected="false">Seo</a>
                                    </li>

                                </ul>
                            </div>

                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-three-general" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-general-tab">

                                        {{-- General Tab Content --}}
                                        <div class="row">

                                            {{-- <input type="hidden" name="company_id" value="{{ $companyId ?? '' }}">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Select Company <span class="req">*</span></label>
                                                    <select class="form-control" name="company_id" id="company_id" disabled required>
                                                        <option value="">Select Company</option>
                                                        @forelse ($companies as $company)
                                                            <option value="{{ $company->id }}"
                                                                @if (old('company_id', $companyId) == $company->id) selected @endif>
                                                                {{ $company->name }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div> --}}

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Select Product Category <span class="req">*</span></label>
                                                    <select class="form-control" name="product_category_id"
                                                        id="product_category_id" required>
                                                        <option value="">Select Product Category</option>
                                                        @forelse ($product_categories as $product)
                                                            <option value="{{ $product->id }}"
                                                                @if (old('product_category_id') == $product->id) selected @endif>
                                                                {{ $product->name }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title"> Title <span class="req">*</span></label>
                                                    <input type="text" class="form-control" name="title"
                                                        value="{{ old('title') }}" id="title">
                                                    @error('title')
                                                        <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sku"> SKU <span class="req">*</span></label>
                                                    <input type="text" class="form-control" name="sku"
                                                        value="{{ old('sku') }}" id="sku" required>
                                                    @error('sku')
                                                        <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-6 mt-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="description-on-card" name="show_on_card" value="1" checked>
                                                    <label class="form-check-label" for="description-on-card">
                                                        Show/Hide - Description on card
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-6 mt-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="description-on-detail-page" name="show_on_page" value="1" checked>
                                                    <label class="form-check-label" for="description-on-detail-page">
                                                        Show/Hide - Detail Page
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea id="summernote_1" name="description">
                                                        {{ old('description') }}
                                                    </textarea>

                                                    @error('description')
                                                        <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }}
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="forThumbnailImg">Thumbnail Image</label>&nbsp;&nbsp;&nbsp;
                                                    <input type="file" name="thumbnail_img" accept="image/*"
                                                        id="forThumbnailImg">
                                                </div>
                                                <span>(<b>Note:</b>Width at least 250px and height 350px)</span>
                                                <br><br><br><br>

                                                @error('thumbnail_img')
                                                    <br>
                                                    <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                       </div>
                                    </div>

                                    <div class="tab-pane fade" id="custom-tabs-three-gallery" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-gallery-tab">

                                        {{-- Gallery Tab Content --}}
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Upload Gallery Images</span>
                                                        </div>
                                                        <div class="custom-file">
                                                        <input type="file" name="gallery[]" class="custom-file-input c-field-req" id="inputGroupFile01" multiple>
                                                        <label class="custom-file-label" for="inputGroupFile01">Upload Gallery Images</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <hr> --}}
                                            {{-- <div class="row">
                                                @foreach ($galleryImages as $img)
                                                    <div class="" style="width: 25%">
                                                        <div class="p-3" style="position: relative;">
                                                            <img height="200px" width="100%" src="{{ asset('/'.$img->featured_image) }}">
                                                            <div  style="position: absolute; top:20px; right:20px; background-color:white;">
                                                                <a href="{{ route('page.galleryImage.delete', $img->id) }}"> <i class="fa fa-fw fa-trash"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div> --}}
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="custom-tabs-three-seo" role="tabpanel"
                                        aria-labelledby="custom-tabs-three-seo-tab">

                                        {{-- SEO Tab Content --}}
                                        {{-- SEO --}}
                                        {{-- <div class="col-md-12" style="margin-top: 80px; margin-bottom: 15px;"><h3>Seo</h3></div> --}}

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="meta_title"> Meta Tag Title</label>
                                                <input type="text" class="form-control" name="meta_title"
                                                    value="{{ old('meta_title') }}" id="title">
                                                @error('meta_title')
                                                    <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Meta Tag Description</label>
                                                <textarea class="form-control" rows="5" name="meta_description" placeholder="Enter Description"></textarea>

                                                @error('meta_description')
                                                    <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }}
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>
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
