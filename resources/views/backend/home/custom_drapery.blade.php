@extends('backend.layouts.master')
@push('header')
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
@endpush
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Custom Drapery</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Custom Drapery</li>
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
                <h3 class="card-title"> Custom Drapery<small></small></h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="{{ route('custom-drapery.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <h4>Upload Drapery Images</h4>
                        </div>

                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image_one" id="" class="custom-file-input c-field-req" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Upload Drapery Image One</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            @if (isset($drapery->d_image_one))
                                <div class="my-3 bg-grey">
                                    <img height="70px" class="img-fluid" src="{{ asset('/'.$drapery->d_image_one ?? '') }}" alt="">
                                </div>
                            @endif
                        </div>

                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image_two" id="" class="custom-file-input c-field-req" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Upload Drapery Image Two</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            @if (isset($drapery->d_image_two))
                                <div class="my-3 bg-grey">
                                    <img height="70px" class="img-fluid" src="{{ asset('/'.$drapery->d_image_two ?? '') }}" alt="">
                                </div>
                            @endif
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="title"> Title </label>
                                <input type="text" class="form-control" name="title" value="{{ old('title', $drapery->title ?? '') }}" id="title">
                                @error('title')
                                    <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="summernote_1" name="description">
                                    {{ old('description', $drapery->description) }}
                                </textarea>

                                @error('description')
                                    <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }}
                                    </span>
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
    <!-- Summernote -->
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script>
        $(function() {
            // Summernote
            $('#summernote_1').summernote({
                height: 300,
            });
        });
    </script>
@endpush
