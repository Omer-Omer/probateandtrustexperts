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
            <h1>TopBar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">TopBar</li>
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
                <h3 class="card-title"> TopBar<small></small></h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="{{ route('topbar.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">

                    <div class="row">

                        @for ($i=1; $i<=7; $i++)
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="menu"> Menu {{ $i }}</label>

                                    <input type="text" class="form-control" name="menu_{{$i}}" value="{{ old('menu_'.$i, isset($topbar->{'menu_'.$i}) ? $topbar->{'menu_'.$i} : '') }}" id="menu">

                                    @error('menu')
                                        <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        @endfor
                    </div>

                    <br>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <h4>Upload Logo</h4>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="logo" id="" class="custom-file-input c-field-req" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Upload Image File</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            @if (isset($topbar->logo))
                                <img height="100px" src="{{ asset('/'.$topbar->logo) }}" alt="">
                            @endif
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
