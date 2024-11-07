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
                    <h3 class="box-title">Create Product Category</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('product.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name"> Category Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" required>
                                @error('name')
                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-end">
                        <button type="submit" class="btn btn-primary" style="float: right; margin-right:15px;">Create</button>
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
