
@extends('backend.layouts.master')
@push('header')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/codemirror/theme/monokai.css') }}">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/simplemde/simplemde.min.css') }}">
@endpush
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Custom Drapery Images</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Custom Drapery Images</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <form action="{{ route('page.gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Banner Image --}}
                        <section class="content">
                            <div class="container-fluid">
                            <!-- SELECT2 EXAMPLE -->
                            <div class="card card-default">
                                <div class="card-header">
                                <h3 class="card-title">Custom Drapery Images</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                    {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                    </button> --}}
                                </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: block;">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">Upload Drapery Images</span>
                                                </div>
                                                <div class="custom-file">
                                                <input type="file" name="gallery[]" class="custom-file-input c-field-req" id="inputGroupFile01" multiple>
                                                <label class="custom-file-label" for="inputGroupFile01">Upload Drapery Images</label>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-6">
                                            <img class="img-fluid" height="150" width="300" src="{{ isset($banner_section->section_images) ? asset('/'.$banner_section->section_images) : '' }}">
                                        </div> --}}
                                        <div class="col-3">
                                            <div class="">
                                                <div class="">
                                                    <button type="submit" class="btn btn-primary">Upload</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
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
                                    </div>

                                </div>
                                <!-- /.card-body -->

                            </div>
                            <!-- /.card -->
                        </section>

                        {{-- SEO --}}
                        {{-- <section class="content">
                            <div class="container-fluid">
                            <!-- SELECT2 EXAMPLE -->
                            <div class="card card-default">
                                <div class="card-header">
                                <h3 class="card-title">SEO</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: block;">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="seo_title">Section Heading</label>
                                            <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title', $seo->meta_title ?? '') }}" id="seo_title" placeholder="SEO Title">
                                            @error('seo_title')
                                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="sec_description">Seo Description</label>
                                            <textarea class="form-control" name="seo_description" rows="3" placeholder="Enter Seo Description ....">
                                                {{ old('seo_description', $seo->meta_description ?? '') }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                            </div>
                            <!-- /.card -->
                        </section> --}}


                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection


@push('footer')


@endpush
