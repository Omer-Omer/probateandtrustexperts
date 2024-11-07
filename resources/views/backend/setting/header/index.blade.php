@extends('backend.layouts.master')

@section('content')

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary"><div class="box-header"><h3 class="c-m-0">Header</h3></div></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Logo</h3>
                    </div>

                    <form action="{{ route('upload-header-logo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Logo</label>&nbsp;&nbsp;&nbsp;
                                <input type="file" name="logo" accept="image/*" id="exampleInputFile" required>
                            </div>
                            <span>(<b>Note:</b>Height at least 250px and width 150px)</span>


                            @error('slider_image')
                            <br>
                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                            @enderror

                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">Upload</button>
                        </div>
                    </form>
                    {{-- <form method="post" action="{{ route('slider-image-upload') }}" enctype="multipart/form-data"
                    class="dropzone" id="dropzone">
                        @csrf
                        <input type="file" accept="image/*" />
                    </form> --}}
                </div>
            </div>

            {{-- Preview Slider --}}
            <div class="col-md-6">
                <div class="row c-mt-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Logo preview</h3>
                        </div>
                        @if (isset($header) && !empty($header->logo))
                            <div style="padding: 10px 20px;">
                                <img height="100" width="200" src="{{ asset('/').$header->logo }}">
                            </div>
                        @else
                            <p class="text-center">Record Not Found</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>


        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Slogan & Menus</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form action="{{ route('header.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                  <div class="form-group">
                    <label for="slogan">Slogan</label>
                    <input type="text" class="form-control" name="slogan" value="{{ old('slogan', $header->slogan) }}" id="slogan" placeholder="Slogan">
                  </div>
                  <div class="form-group">
                    <label for="menu_one">Menu One</label>
                    <input type="text" class="form-control" name="menu_one" value="{{ old('menu_one', $header->menu_one ) }}" id="menu_one" placeholder="Menu One">
                  </div>
                  <div class="form-group">
                    <label for="menu_two">Menu Two</label>
                    <input type="text" class="form-control" name="menu_two" value="{{ old('menu_two', $header->menu_two) }}" id="menu_two" placeholder="Menu Two">
                  </div>
                  <div class="form-group">
                    <label for="menu_three">Menu Three</label>
                    <input type="text" class="form-control" name="menu_three" value="{{ old('menu_three', $header->menu_three) }}" id="menu_three" placeholder="Menu Three">
                  </div>
                  <div class="form-group">
                    <label for="menu_four">Menu Four</label>
                    <input type="text" class="form-control" name="menu_four" value="{{ old('menu_four', $header->menu_four) }}" id="menu_four" placeholder="Menu Four">
                  </div>

                  <div class="form-group">
                    <label for="menu_five">Menu Five</label>
                    <input type="text" class="form-control" name="menu_five" value="{{ old('menu_five', $header->menu_five) }}" id="menu_five" placeholder="Menu Five">
                  </div>

{{--                  <div class="form-group">--}}
{{--                    <label for="menu_six">Menu Four</label>--}}
{{--                    <input type="text" class="form-control" name="menu_six" value="{{ old('menu_six', $header->menu_six) }}" id="menu_six" placeholder="Menu Six">--}}
{{--                  </div>--}}

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
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
<!-- CK Editor -->
<script src="{{ asset('backend/bower_components/ckeditor/ckeditor.js') }}"></script>

<script type="text/javascript">
    Dropzone.options.dropzone =
     {
        maxFilesize: 12,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
           return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 5000,
        success: function(file, response)
        {
            console.log(response);
        },
        error: function(file, response)
        {
           return false;
        }
};
</script>

<script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1')
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5()
    })
  </script>

@endpush
