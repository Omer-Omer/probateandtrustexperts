@extends('backend.layouts.master')

@section('content')
{{-- <script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
</script> --}}
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary"><div class="box-header"><h3 class="c-m-0">Footer</h3></div></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Logo</h3>
                    </div>

                    <form action="{{ route('upload-footer-logo') }}" method="POST" enctype="multipart/form-data">
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
                        @if (isset($footer) && !empty($footer->logo))
                            <div style="padding: 10px 20px;">
                                <img height="100" width="200" src="{{ asset('/').$footer->logo }}">
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
                <h3 class="box-title">Footer Detials</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form action="{{ route('footer.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-body">

                    <div class="form-group">
                        <label for="name">Company Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $footer->name ?? '') }}" id="name" placeholder="Company Name">
                    </div>


                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="description" placeholder="Enter Description">{{ old('description', $footer->description ?? '') }}</textarea>
                </div>

                  <div class="form-group">
                    <label for="find_us">Find Us</label>
                    <input type="text" class="form-control" name="find_us" value="{{ old('find_us', $footer->find_us ?? '') }}" id="find_us" placeholder="Find Us">
                  </div>
                  <div class="form-group">
                    <label for="call_us">Call Us</label>
                    <input type="text" class="form-control" name="call_us" value="{{ old('call_us', $footer->call_us ?? '') }}" id="call_us" placeholder="Call Us">
                  </div>
                  <div class="form-group">
                    <label for="mail_us">Mail Us</label>
                    <input type="text" class="form-control" name="mail_us" value="{{ old('mail_us', $footer->mail_us ?? '') }}" id="mail_us" placeholder="Mail Us">
                  </div>
                  <div class="form-group">
                    <label for="copyright">Copy Right</label>
                    <input type="text" class="form-control" name="copyright" value="{{ old('copyright', $footer->copyright ?? '') }}" id="copyright" placeholder="Copy Right">
                  </div>

{{--                    <div class="form-group">--}}
{{--                    <label for="facebook">Facebook Link</label>--}}
{{--                    <input type="text" class="form-control" name="facebook" value="{{ old('facebook', $footer->facebook ?? '') }}" id="facebook" placeholder="Facebook Link">--}}
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
