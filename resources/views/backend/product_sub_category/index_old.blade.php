@extends('backend.layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Product List
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

                    <a href="{{ route('product.subcategory.create') }}">
                        <button class="btn " style="float: right;">Create <i class="fa fa-fw fa-plus"></i></button>
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subcategories as $key => $subcategory)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $subcategory->product_category->name ?? 'n/a' }}</td>
                                <td>{{ $subcategory->name ?? 'n/a' }}</td>
                                <td class="c-d-flex">
                                    <a href="{{ route('product.subcategory.edit', $subcategory->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                    <a href="{{ route('product.subcategory.delete', $subcategory->id) }}"> <i class="fa fa-fw fa-trash-o"></i> </a>
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
