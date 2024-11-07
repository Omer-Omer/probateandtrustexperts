@extends('backend.layouts.master')

@section('content')

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Product</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="box-body">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Company</label>
                                <select class="form-control" name="company_id" id="company_id"  required>
                                  <option value="">Select Company</option>
                                  @forelse ($companies as $company)

                                  <option value="{{ $company->id }}" @if(old('company_id', $product->company_id) == $company->id) selected @endif>{{ $company->name }}</option>
                                  @empty

                                  @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Product Category</label>
                                <select class="form-control" name="product_category_id" id="product_category_id"  required>
                                  <option value="">Select Product Category</option>
                                    @forelse ($product_categories as $product_cat)
                                        <option value="{{ $product_cat->id }}" @if( $product->product_category_id == $product_cat->id ) selected @endif>{{ $product_cat->name }}</option>
                                    @empty

                                    @endforelse
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
                                <input type="text" class="form-control" name="sku" value="{{ old('sku', $product->sku) }}" id="sku" required>

                                @error('sku')
                                    <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title"> Title</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title', $product->title) }}" id="title" required>
                                @error('title')
                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="5" name="description" placeholder="Enter Description">
                                    {{ $product->description }}
                                </textarea>

                                @error('address')
                                    <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="forThumbnailImg">Thumbnail Image</label>&nbsp;&nbsp;&nbsp;
                                <input type="file" name="thumbnail_img" accept="image/*" id="forThumbnailImg" @if(empty($product->thumbnail_img)) required @endif>
                            </div>
                            <span>(<b>Note:</b>Width at least 250px and height 350px)</span>

                            @error('thumbnail_img')
                            <br>
                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                            @enderror
                        </div>

                        @if(isset($product->thumbnail_img))
                            <div class="col-md-6">
                                    <img height="250" class="img-fluid" src="{{ asset('/').$product->thumbnail_img }}">
                                <a href="{{ route('delete-thumbnail-img', $product->id) }}"><i class="fa fa-fw fa-trash"></i></a>
                            </div>
                        @endif


                        {{-- Detailed Description --}}
                        <div class="col-md-12" style="margin-top: 50px; margin-bottom: 15px;"><h3>Detailed Description</h3></div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Fabric</label>
                                <select class="form-control" name="fabric_id" id="fabric_id"  required>
                                    <option value="">Select Fabric</option>
                                    <option value="woven" @if(old('fabric_id', $product->fabric_id)  == 'woven') selected @endif> Woven </option>
                                    <option value="plain" @if(old('fabric_id', $product->fabric_id) == 'plain') selected @endif> plain </option>
                                    <option value="satin_weave" @if(old('fabric_id', $product->fabric_id) == 'satin_weave') selected @endif> satin_weave </option>
                                    <option value="twill_weave" @if(old('fabric_id', $product->fabric_id) == 'twill_weave') selected @endif> twill_weave </option>
                                    <option value="cotton" @if(old('fabric_id', $product->fabric_id) == 'cotton') selected @endif> cotton </option>
                                    <option value="denim" @if(old('fabric_id', $product->fabric_id) == 'denim') selected @endif> denim </option>

                                </select>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="3" name="content" placeholder="Enter Content"> {{ old('content', $product->content) }} </textarea>
                                @error('content')
                                    <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Made In</label>
                                <select class="form-control" name="made_in_id" id="made_in_id"  required>
                                    <option value=""> Select Made In</option>
                                    <option value="china" @if(old('made_in_id', $product->made_in_id) == 'china') selected @endif> China </option>
                                    <option value="uk" @if(old('made_in_id', $product->made_in_id) == 'uk') selected @endif> UK </option>
                                    <option value="turkey" @if(old('made_in_id', $product->made_in_id) == 'turkey') selected @endif> Turkey </option>
                                    <option value="indonesia" @if(old('made_in_id', $product->made_in_id) == 'indonesia') selected @endif> Indonesia </option>
                                    <option value="pakistan" @if(old('made_in_id', $product->made_in_id) == 'pakistan') selected @endif> Pakistan </option>

                                  {{-- @forelse ($companies as $company)
                                  <option value="{{ $company->id }}" @if(old('company_id') == $company->id) selected @endif>{{ $company->name }}</option>
                                  @empty

                                  @endforelse --}}
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="forDate"> Date</label>
                                <input type="date" class="form-control" name="date" value="{{ old('date', $product->date) }}" id="forDate">
                                @error('date')
                                    <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""> Gallery Images </label>
                                <input type="file" class="form-control" name="gallery_images[]" id="gallery_images" multiple @if(!isset($product->product_images)) required @endif>

                                <span>(<b>Note:</b>Width at least 500px and Height 800px)</span>
                                @error('logo')
                                <br>
                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>




                        @forelse ($product->product_images as $pro_image)
                            <div class="col-md-3">
                                <img height="250" class="img-fluid" src="{{ asset('/').$pro_image->img_url }}">
                                <a href="{{ route('delete-single-gallery-img', $pro_image->id) }}"><i class="fa fa-fw fa-trash"></i></a>
                            </div>
                        @empty

                        @endforelse




                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer text-end">
                        <button type="submit" class="btn btn-primary" style="float: right; margin-right:15px;">Update</button>
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

    // $('#company_id').on('change', function() {
    //     $('#product_id').find('option').remove();

    //     var company_id = $(this).find(":selected").val();

    //     var url = "{{ route('get-product-categories') }}";
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
