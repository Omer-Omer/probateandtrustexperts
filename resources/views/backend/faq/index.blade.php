@extends('backend.layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        FAQ
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">FAQ</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">FAQ List</h3>
                    <a href="{{ route('admin.faq.create') }}">
                        <button class="btn " style="float: right;">ADD <i class="fa fa-fw fa-plus"></i></button>
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Heading</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($faq_list as $key => $faq)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $faq->heading ?? 'n/a' }}</td>
                                <td>{{ substr($faq->description, 0, 120).'... ' ?? 'n/a' }}</td>
                                <td class="c-d-flex">
                                    <a href="{{ route('admin.faq.edit', $faq->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                    {{-- <form id="deleteForm" action="{{ route('admin.faq.destroy', $faq->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                       <a onclick="document.getElementById('deleteForm').submit()"> <i class="fa fa-fw fa-trash-o"></i> </a>
                                    </form> --}}
                                    <a href="{{ route('admin.faq.delete', $faq->id) }}"> <i class="fa fa-fw fa-trash-o"></i> </a>

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
