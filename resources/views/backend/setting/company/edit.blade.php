@extends('backend.layouts.master')

@section('content')

<!-- Main content -->
<section class="content">

    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Company</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('update-company', $company->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="company_name"> Name</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name', $company->name  ?? '') }}" id="company_name" required>
                            @error('name')
                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="companyEmail"> Email</label>
                            <input type="text" class="form-control" name="email"
                                value="{{ old('email', $company->email  ?? '') }}" id="companyEmail" required>
                            @error('email')
                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="company_address"> Address</label>
                            <input type="text" class="form-control" name="address"
                                value="{{ old('address', $company->address  ?? '') }}" id="company_address">
                            @error('address')
                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3"  name="description" placeholder="Enter Description">
                                {{ old('description', $company->description  ?? '') }}
                            </textarea>
                            @error('description')
                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="company_phone"> Phone</label>
                            <input type="text" class="form-control" name="phone_no"
                                value="{{ old('phone', $company->phone_no  ?? '') }}" id="company_phone">
                            @error('phone')
                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for=""> Logo </label>
                            <input type="file" class="form-control" name="logo" id="">

                            <span>(<b>Note:</b>Height at least 200px and width 200px)</span>
                            @error('logo')
                            <br>
                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for=""> Cover </label>
                            <input type="file" class="form-control" name="cover" id="">

                            <span>(<b>Note:</b>Height at least 400px and width 1200px)</span>
                            @error('cover')
                            <br>
                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label>Contact Information</label>
                            <textarea class="form-control" rows="6" name="contact_info" placeholder="Enter Contact Information" required>
                                {{ old('contact_info', $company->contact_info ?? '') }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label>Shipping & Reutrn Policy</label>
                            <textarea class="form-control" rows="6" name="shipping_return_policy" placeholder="Enter Shipping & Reutrn Policy" required>
                                {{ old('contact_info', $company->shipping_return_policy ?? '') }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label>Cancellation Policy</label>
                            <textarea class="form-control" rows="6" name="cancellation_policy" placeholder="Enter Cancellation Policy" required>
                                {{ old('contact_info', $company->cancellation_policy ?? '') }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label>
                              <input type="checkbox" name="show_in_home_grid" class="flat-red" @if($company->show_in_home_grid == 1) checked @endif>
                              &nbsp; Show in Home Grid
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                              <input type="checkbox" name="show_in_home_tab" class="flat-red" @if($company->show_in_home_tab == 1) checked @endif>
                              &nbsp; Show in Home Tab
                            </label>
                        </div>

                        {{-- <div class="form-check">

                            @forelse ($product_categories as $cat)
                               @foreach ($company_product_categories as $company_cat)
                                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $cat->id }}" id="flexCheckDefault" @if($cat->id == $company_cat->id) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $cat->name }}
                                    </label>
                                    &nbsp; &nbsp; &nbsp;

                                    @break
                               @endforeach
                            @empty

                            @endforelse

                        </div> --}}



                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
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
    Dropzone.options.dropzone = {
        maxFilesize: 12,
        renameFile: function (file) {
            var dt = new Date();
            var time = dt.getTime();
            return time + file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 5000,
        success: function (file, response) {
            console.log(response);
        },
        error: function (file, response) {
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
