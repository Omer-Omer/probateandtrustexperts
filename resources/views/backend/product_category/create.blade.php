@extends('backend.layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
                <h3 class="card-title">Add Category<small></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('product.category.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                      <label for="name"> Category Name</label>
                      <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" required>
                      @error('name')
                      <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                      @enderror
                  </div>

                    {{-- <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">Upload Icon Image</span>
                                </div>
                                <div class="custom-file">
                                <input type="file" name="icon" class="custom-file-input c-field-req" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Upload Icon</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">Upload Background Image</span>
                                </div>
                                <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input c-field-req" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Upload Image</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                        </div>
                    </div> --}}

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

@endpush
