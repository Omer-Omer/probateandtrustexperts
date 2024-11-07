@extends('backend.layouts.master')

@section('content')

<!-- Main content -->
<section class="content">

    <div class="container-fluid">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">

                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- /.box-body -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary" style="float: right; margin-right:15px;">Save</button>
                    </div>

                    <br>
                    <br>

                    <!-- general form elements -->
                    <div class="box box-primary">

                        <div class="box-header with-border">
                            {{-- <h3 class="box-title">Create Product</h3> --}}
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#general">General</a></li>
                                <li><a data-toggle="tab" href="#data">Data</a></li>
                                <li><a data-toggle="tab" href="#image">Image</a></li>
                                <li><a data-toggle="tab" href="#seo">Seo</a></li>
                                <li><a data-toggle="tab" href="#discount">Discount</a></li>
                            </ul>

                        </div>

                        <div class="box-body">
                            <div class="tab-content">
                                <div id="general" class="tab-pane fade in active">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select Product Category</label>
                                            <select class="form-control" name="product_category_id" id="product_category_id"  required>
                                            <option value="">Select Product Category</option>
                                            @forelse ($product_categories as $product)

                                            <option value="{{ $product->id }}" @if(old('product_category_id') == $product->id) selected @endif>{{ $product->name }}</option>
                                            @empty

                                            @endforelse
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select Product Sub Category</label>
                                            <select class="form-control" name="product_sub_category_id" id="product_sub_category_id"  required>
                                                <option value="">Select Product Sub Category</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select Product</label>
                                            <select class="form-control" name="product_id" id="product_id"  required>>
                                            <option value="">Select Product</option>

                                            </select>
                                        </div>
                                    </div> --}}


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sku"> Sku</label>
                                            <input type="text" class="form-control" name="sku" value="{{ old('sku') }}" id="sku" required>
                                            @error('address')
                                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title"> Title</label>
                                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="title" required>
                                            @error('title')
                                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="5" name="description" placeholder="Enter Description">
                                                {{ old('description') }}
                                            </textarea>

                                            @error('address')
                                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="forThumbnailImg">Thumbnail Image</label>&nbsp;&nbsp;&nbsp;
                                            <input type="file" name="thumbnail_img" accept="image/*" id="forThumbnailImg" required>
                                        </div>
                                        <span>(<b>Note:</b>Width at least 250px and height 350px)</span>


                                        @error('thumbnail_img')
                                        <br>
                                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="data" class="tab-pane fade">
                                    <h3>Data</h3>
                                    <p>Content for Data.</p>
                                </div>
                                <div id="image" class="tab-pane fade">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for=""> Gallery Images </label>
                                            <input type="file" class="form-control" name="gallery_images[]" id="gallery_images" multiple>

                                            <span>(<b>Note:</b>Width at least 500px and Height 800px)</span>
                                            @error('logo')
                                            <br>
                                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div id="seo" class="tab-pane fade">
                                    {{-- SEO --}}
                                    {{-- <div class="col-md-12" style="margin-top: 80px; margin-bottom: 15px;"><h3>Seo</h3></div> --}}

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="meta_title"> Meta Tag Title</label>
                                            <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title') }}" id="title">
                                            @error('meta_title')
                                            <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Meta Tag Description</label>
                                            <textarea class="form-control" rows="5" name="meta_description" placeholder="Enter Description"></textarea>

                                            @error('meta_description')
                                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div id="discount" class="tab-pane fade">
                                    <h3>Discount</h3>
                                    <p>Content for Discount</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.box -->

                </form>

            </div>

        </div>
        <!-- /.row -->

      </div>

</section>
<!-- /.content -->

@endsection


@push('footer')
<!-- CK Editor -->
<script src="{{ asset('backend/bower_components/ckeditor/ckeditor.js') }}"></script>

{{-- <script type="text/javascript">
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

</script> --}}

<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })

    $('#product_category_id').on('change', function() {
        var category_id = $(this).find(":selected").val();

        if(category_id == '') {
            $('#product_sub_category_id').empty();
            $('#product_sub_category_id').append('<option value="">Select First Category</option>')
        }else{

            $.ajax({
                url: "{{ url('/admin/sub-categories').'/' }}" + category_id,
                type: 'get',
                dataType: 'json',
                success: function(response){

                    console.log(response);
                    $('#product_sub_category_id').empty();
                    $.each(response,function(index,row){
                        console.log(row.name);
                        $('#product_sub_category_id').append('<option value="'+row.id+'">'+row.name+'</option>')
                    })

                }
                // , error: function (jqXHR, textStatus, errorThrown) {
                //     console.log(jqXHR);
                //     console.log(textStatus);
                //     console.log(errorThrown);
                //     // errorFunction();
                // }
            });

        }

    });

    // $('#company_id').on('change', function() {
    //     $('#product_id').find('option').remove();

    //     var company_id = $(this).find(":selected").val();

    //     var url = "";
    //     console.log(company_id);
    //     console.log(url);

    //     $.ajax({
    //         url: url,
    //         type: "GET",
    //         data:{

    //             company_id: company_id
    //         },
    //         cache: false,
    //         dataType: 'json',
    //         success: function(result){
    //             console.log(result);


    //             $('#product_id').append('<option value="">Select Product</option>');
    //             $.each(result,function(index,row){
    //                 console.log(row.product_category_id);
    //                 $('#product_id').append('<option value="'+row.product_category_id+'">'+row.product_category_name+'</option>')

    //             })

    //             // var resultData = dataResult.data;
    //             // var bodyData = '';
    //             // var i=1;
    //             // $.each(resultData,function(index,row){
    //             //     var editUrl = url+'/'+row.id+"/edit";
    //             //     bodyData+="<tr>"
    //             //     bodyData+="<td>"+ i++ +"</td><td>"+row.name+"</td><td>"+row.email+"</td><td>"+row.phone+"</td>"
    //             //     +"<td>"+row.city+"</td><td><a class='btn btn-primary' href='"+editUrl+"'>Edit</a>"
    //             //     +"<button class='btn btn-danger delete' value='"+row.id+"' style='margin-left:20px;'>Delete</button></td>";
    //             //     bodyData+="</tr>";

    //             // })
    //             // $("#bodyData").append(bodyData);
    //         }
    //     });


    // });




</script>

@endpush
