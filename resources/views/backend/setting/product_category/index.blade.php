@extends('backend.layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Product Category List
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Product Category List</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Product Category List</h3>
                    <a href="{{ route('add-product-category') }}">
                        <button class="btn " style="float: right;">ADD <i class="fa fa-fw fa-plus"></i></button>
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($product_categories as $key => $category)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $category->name ?? 'n/a' }}</td>
                                <td class="c-d-flex">
                                    <a href="{{ route('edit-product-category', $category->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                    {{-- <form id="deleteForm" action="{{ route('delete-product-category', $category->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                       <a onclick="document.getElementById('deleteForm').submit()"> <i class="fa fa-fw fa-trash-o"></i> </a>
                                    </form> --}}
                                    <a href="{{  route('delete-product-category', $category->id) }}"> <i class="fa fa-fw fa-trash-o"></i> </a>

                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Record Found</td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

@endsection
