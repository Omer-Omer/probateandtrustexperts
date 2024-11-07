@extends('backend.layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Configuration</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Configuration</li>
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
                <h3 class="card-title">Add Configuration<small></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('configuration.update', $config->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                      <label for="key"> Key </label>
                      <input type="text" class="form-control" name="key" value="{{ old('key', $config->key) }}" id="key" required>
                      @error('key')
                        <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label for="value"> Value </label>
                      <input type="text" class="form-control" name="value" value="{{ old('value', $config->value) }}" id="value" required>
                      @error('value')
                        <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                      @enderror
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

@endpush
