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

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Banner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Banner</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title"> Banner<small></small></h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <h4>Upload Banner Images</h4>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="banner_image" id="" class="custom-file-input c-field-req" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Upload Banner Image</label>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center text-end">
                            {{-- style="background-color: rgb(195, 195, 195);" --}}

                            @if (isset($banner->b_image))
                                <div class="col-4">
                                    <div class="my-3 bg-grey">
                                        <img height="70px" class="img-fluid" src="{{ asset('/'.$banner->b_image) }}" alt="">
                                    </div>
                                </div>
                            @endif
                            {{-- @forelse ($banners as $banner)
                                    <div class="col-4">
                                        <div class="my-3">
                                            <img height="" class="img-fluid" src="{{ asset('/'.$banner->featured_image) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="my-3">
                                            <a href="{{ route('page.galleryImage.delete', $banner->id) }}" class="btn btn-block bg-gradient-danger">Delete</a>
                                        </div>
                                    </div>
                            @empty
                            @endforelse --}}

                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="bh_one"> Banner Heading One </label>
                                <input type="text" class="form-control" name="bh_one" value="{{ old('bh_one', $banner->bh_one) }}" id="bh_one">
                                @error('bh_one')
                                    <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="bh_two"> Banner Heading Two </label>
                                <input type="text" class="form-control" name="bh_two" value="{{ old('bh_two', $banner->bh_two) }}" id="bh_two">
                                @error('bh_two')
                                    <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="bh_three"> Banner Heading Three </label>
                                <input type="text" class="form-control" name="bh_three" value="{{ old('bh_three', $banner->bh_three) }}" id="bh_three">
                                @error('bh_three')
                                    <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="bh_four"> Banner Heading Four </label>
                                <input type="text" class="form-control" name="bh_four" value="{{ old('bh_four', $banner->bh_four) }}" id="bh_four">
                                @error('bh_four')
                                    <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="bh_number"> Banner Number </label>
                                <input type="text" class="form-control" name="bh_number" value="{{ old('bh_number', $banner->bh_number) }}" id="bh_number">
                                @error('bh_number')
                                    <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="bh_button"> Banner Button </label>
                                <input type="text" class="form-control" name="bh_button" value="{{ old('bh_button', $banner->bh_button) }}" id="bh_button">
                                @error('bh_button')
                                    <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>


                    </div>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection


@push('footer')
    <!-- Select2 -->
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

        $('.form_section').hide();

        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        });

        $('.select2').on('change', function() {

            var section_type = $(".select2 option:selected").val();
            console.log(section_type);
            $(".c-field-req").prop('required', false);
            $('.form_section').hide();

            $('#'+ section_type + '_section').show();

            $('#form_'+ section_type).prop('required',true);
        })

    </script>
@endpush
