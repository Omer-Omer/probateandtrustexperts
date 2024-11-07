@extends('backend.layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       Review List
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Review List</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                {{-- <div class="box-header">
                    <h3 class="box-title">Review List</h3>
                    <a href="{{ route('admin.privacy-policy.create') }}">
                        <button class="btn " style="float: right;">ADD <i class="fa fa-fw fa-plus"></i></button>
                    </a>
                </div> --}}
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Email</th>
                                <th>Comment</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($review_list as $key => $review)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $review->email ?? 'n/a' }}</td>
                                <td>{{ substr($review->comment, 0, 80).'...' ?? 'n/a' }}</td>
                                {{-- <td class="c-d-flex">
                                    <a href="{{ route('admin.privacy-policy.edit', $review->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                    <form id="deleteForm" action="{{ route('admin.privacy-policy.destroy', $review->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                       <a onclick="document.getElementById('deleteForm').submit()"> <i class="fa fa-fw fa-trash-o"></i> </a>
                                    </form>
                                </td> --}}
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Review Yet Found</td>
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
