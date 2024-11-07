@extends('backend.layouts.master')
@push('header')
    <!-- daterange picker -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}"> --}}
    <!-- iCheck for checkboxes and radio inputs -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}
    <!-- Bootstrap Color Picker -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}"> --}}
    <!-- Tempusdominus Bootstrap 4 -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}"> --}}
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}"> --}}
    <!-- Bootstrap4 Duallistbox -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}"> --}}
    <!-- BS Stepper -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/plugins/bs-stepper/css/bs-stepper.min.css') }}"> --}}
    <!-- dropzonejs -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/plugins/dropzone/min/dropzone.min.css') }}"> --}}

    <style>
        .select2-container .select2-selection--single {
            height: 40px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
        }
    </style>
@endpush
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Section<small></small></h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            {{-- Section One --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{ route('homeStore') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="section_type" value="banner_section">

                                        <div class="box-body">

                                            {{-- <div class="form-group">
                                                <label for="banner_image_text">Banner Image Text</label>
                                                <input type="text" class="form-control" name="banner_image_text" value="{{ old('banner_image_text', $section_one->section_image_text  ?? '') }}" id="banner_image_text" placeholder="Banner Image Text" required>
                                            </div>

                                            <br> --}}

                                            <div class="form-group">
                                                <label for="exampleInputFile">Upload Banner Image</label>&nbsp;&nbsp;&nbsp;
                                                <input type="file" name="banner_image" accept="image/*" id="exampleInputFile" @if (isset($section_one) && isset($section_one->section_image)) @else required @endif>
                                            </div>
                                            <span>(<b>Note:</b>Height at least 250px and width 900px)</span>

                                            @error('banner_image')
                                            <br>
                                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                            @enderror

                                        </div>

                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary btn-flat">Upload</button>
                                        </div>
                                    </form>
                                </div>

                                {{-- Preview Slider --}}
                                <div class="col-md-6">
                                    <div class="row c-mt-3">
                                        @if(isset($banner_section))
                                            <div class="col-md-4">
                                                <img height="100" width="300" src="{{ asset('/').$banner_section->section_images }}">
                                            </div>
                                        @else
                                            <div class="col-12">
                                                <p>Image Not Found</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <br><hr><br>

                            {{-- Category Section --}}
                            <div class="row">
                                <h3>Category Section</h3>
                                <div class="col-md-12">
                                    <form action="{{ route('homeStore') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="section_type" value="category_section">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Select Category</label>
                                                    <select class="select2 c-field-req" multiple="multiple" id="" name="category[]" data-placeholder="Select Multiuple Categories" style="width: 100%;">
                                                        @forelse ($product_categories as $pro)
                                                            <option value="{{ $pro->id }}" @if (in_array($pro->id, json_decode($category_section->section_description))) selected @endif> {{ $pro->name }}  </option>
                                                        @empty
                                                            <option value=""> No Found </option>
                                                        @endforelse

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <br><hr><br>

                            {{-- About Us Section --}}
                            <div class="row">
                                <h3>About Us Section</h3>
                                <div class="col-md-12">
                                    <form action="{{ route('homeStore') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="section_type" value="aboutus_section">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload Backgroud Image</span>
                                                    </div>
                                                    <div class="custom-file">
                                                    <input type="file" name="image" id="image" class="custom-file-input c-field-req" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Upload Background Image</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                @if (isset($aboutus_section->section_images))
                                                   <img height="100" width="300" src="{{ asset('/').$aboutus_section->section_images }}">
                                                @endif
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea id="summernote_1" name="description">
                                                        {{ old('description', $aboutus_section->section_description ?? '') }}
                                                    </textarea>

                                                    @error('description')
                                                        <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <br><hr><br>

                            {{-- Partner Section --}}
                            <div class="row">
                                <h3>Partner Section</h3>

                                <div class="col-md-12">
                                    <form action="{{ route('homeStore') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="section_type" value="partner_section">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                    </div>
                                                    <div class="custom-file">
                                                    <input type="file" name="partner_logo[]" id="partner_logo" class="custom-file-input c-field-req" id="inputGroupFile01" multiple>
                                                    <label class="custom-file-label" for="inputGroupFile01">Upload Logo</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>

                                    <div class="row">
                                        @foreach ($partner_section as $img)
                                            <div class="" style="width: 25%">
                                                <div class="p-3" style="position: relative;">
                                                    <img height="200px" width="100%" src="{{ asset('/'.$img->featured_image) }}">
                                                    <div  style="position: absolute; top:20px; right:20px; background-color:white;">
                                                        <a href="{{ route('page.galleryImage.delete', $img->id) }}"> <i class="fa fa-fw fa-trash"></i> </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection



@push('footer')

    <!-- Select2 -->
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    {{-- <script src="{{ asset('backend/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script> --}}
    <!-- InputMask -->
    {{-- <script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/plugins/inputmask/jquery.inputmask.min.js') }}"></script> --}}
    <!-- date-range-picker -->
    {{-- <script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script> --}}
    <!-- bootstrap color picker -->
    {{-- <script src="{{ asset('backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script> --}}
    <!-- Tempusdominus Bootstrap 4 -->
    {{-- <script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script> --}}
    <!-- Bootstrap Switch -->
    {{-- <script src="{{ asset('backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script> --}}
    <!-- BS-Stepper -->
    {{-- <script src="{{ asset('backend/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script> --}}
    <!-- dropzonejs -->
    {{-- <script src="{{ asset('backend/plugins/dropzone/min/dropzone.min.js') }}"></script> --}}

    <script>

        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        });

        $(function () {
            // Summernote
            $('#summernote_1').summernote({
                height: 300,
            });
        });


        // $('.select2').on('change', function() {

        //     var section_type = $(".select2 option:selected").val();
        //     console.log(section_type);
        //     $(".c-field-req").prop('required', false);
        //     $('.form_section').hide();

        //     $('#'+ section_type + '_section').show();

        //     $('#form_'+ section_type).prop('required',true);
        // })

    </script>
@endpush
