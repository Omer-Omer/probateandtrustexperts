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
                    <h1>Company</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Company</li>
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
                            <h3 class="card-title">Edit Company<small></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.company.update', $company->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name"> Company Name</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name', $company->name) }}" id="name" required>
                                            @error('name')
                                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="email"> Company Email</label>
                                            <input type="text" class="form-control" name="email"
                                                value="{{ old('email', $company->email) }}" id="email">
                                            @error('email')
                                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="address"> Company Address</label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ old('address', $company->address) }}" id="address">
                                            @error('address')
                                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="number"> Company Number</label>
                                            <input type="text" class="form-control" name="number"
                                                value="{{ old('number', $company->number) }}" id="number">
                                            @error('number')
                                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="time"> Company Timing</label>
                                            <input type="text" class="form-control" name="time"
                                                value="{{ old('time', $company->time) }}" id="time">
                                            @error('time')
                                                <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin: 20px 0px;">
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload Banner Images</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="banner" class="custom-file-input c-field-req"
                                                    id="inputGroupFile01" multiple="">
                                                <label class="custom-file-label" for="inputGroupFile01">Upload Banner Images</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        @if (isset($company->banner))
                                            <img height="50px" src="{{ asset('/'.$company->banner) }}" alt="">
                                        @endif
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload Logo Images</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="logo" class="custom-file-input c-field-req"
                                                    id="inputGroupFile01" multiple="">
                                                <label class="custom-file-label" for="inputGroupFile01">Upload Logo Images</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        @if (isset($company->logo))
                                            <img height="50px" src="{{ asset('/'.$company->logo) }}" alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="summernote_1" name="description" style="height: 300px;" required>
                                                {{ old('description', $company->description ?? '') }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
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
                                    <div class="col-6" style="background-color: #e9ecef;">
                                        <img class="img-fluid" height="50" width="50" src="{{ isset($product_category->icon) ? asset('/'.$product_category->icon) : '' }}">
                                    </div>
                                </div>
                                <br>
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
                                        <img class="img-fluid" height="150" width="300" src="{{ isset($product_category->image) ? asset('/'.$product_category->image) : '' }}">
                                    </div>
                                </div> --}}

                            </div>
                            <!-- /.card-body -->

                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product</h3>
                            <div class="text-end" style="text-align: end;">
                                <a target="_blank" class="add-custom-btn" href="{{ url('/admin/company/product/create/'. $company->id) }}"><i class="fa fa-plus"></i>
                                    &nbsp;&nbsp; ADD</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Company</th>
                                        <th>Category</th>
                                        <th>Thumbnail Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $key => $product)
                                        <tr class="align-item-center">
                                            <td class="align-middle">{{ $key + 1 }}</td>
                                            <td class="align-middle">{{ $product->title ?? 'n/a' }}</td>
                                            <td class="align-middle">{{ $product->product_category->name ?? 'n/a' }}</td>
                                            <td><img class="img-fluid" height="50" width="50"
                                                    src="{{ isset($product->thumbnail_image) ? asset('/' . $product->thumbnail_image) : '' }}">
                                            </td>
                                            <td class="c-d-flex align-middle text-center">
                                                <a target="_blank" href="{{ route('product.edit', $product->id) }}"><i
                                                        class="fa fa-fw fa-edit"></i></a>
                                                {{-- <form id="deleteForm" action="{{ route('product.destroy', $product->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                            <a onclick="document.getElementById('deleteForm').submit()"> <i class="fa fa-fw fa-trash-o"></i> </a>
                                            </form> --}}
                                                <a href="{{ route('admin.product.delete', $product->id) }}"> <i
                                                        class="fa fa-fw fa-trash"></i> </a>

                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">No Record Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                {{-- <tfoot>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Title</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot> --}}
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


@push('footer')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
@push('footer')
<!-- Summernote -->
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- CodeMirror -->
<script src="{{ asset('backend/plugins/codemirror/codemirror.js') }}"></script>
<script src="{{ asset('backend/plugins/codemirror/mode/css/css.js') }}"></script>
<script src="{{ asset('backend/plugins/codemirror/mode/xml/xml.js') }}"></script>
<script src="{{ asset('backend/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>

<script>
    $(function () {
        // Summernote
        $('#summernote_1').summernote({
            height: 300,
        });
        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>

@endpush
