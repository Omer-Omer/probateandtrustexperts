@extends('backend.layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        User List
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">User List</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">User List</h3>

                    <a href="{{ route('add-user') }}">
                        <button class="btn " style="float: right;">ADD <i class="fa fa-fw fa-plus"></i></button>
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $key => $user)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $user->profile_image ?? 'n/a' }}</td>
                                <td>{{ $user->name ?? 'n/a' }}</td>
                                <td>{{ $user->email ?? 'n/a' }}</td>
                                <td>{{ $user->description ?? 'n/a' }}</td>

                                <td class="c-d-flex">
                                    <a href="{{ route('edit-user', $user->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                    {{-- <form id="deleteForm" action="{{ route('admin.delete-company', $company->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                    </form> --}}
                                    <a href="{{ route('admin.delete-user', $user->id) }}"> <i class="fa fa-fw fa-trash-o"></i> </a>
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
