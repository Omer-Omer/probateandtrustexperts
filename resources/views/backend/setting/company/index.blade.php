@extends('backend.layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Companies List
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Companies List</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Companies List</h3>

                    <a href="{{ route('add-company') }}">
                        <button class="btn " style="float: right;">ADD <i class="fa fa-fw fa-plus"></i></button>
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Company Name</th>
                                <th>Company Email</th>
                                <th>Address</th>
                                <th>Phone No</th>
                                <th>Home Grid</th>
                                <th>Home Tab</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($companies as $key => $company)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $company->name ?? 'n/a' }}</td>
                                <td>{{ $company->email ?? 'n/a' }}</td>
                                <td>{{ $company->address ?? 'n/a' }}</td>
                                <td>{{ $company->phone_no ?? 'n/a' }}</td>
                                <td>
                                    @if ($company->show_in_home_grid == 1)
                                        <span class="custom-show-d"> showing </span>
                                    @endif
                                </td>
                                <td>
                                    @if ($company->show_in_home_tab == 1)
                                        <span class="custom-show-d"> showing </span>
                                    @endif
                                </td>

                                <td class="c-d-flex">
                                    <a href="{{ route('edit-company', $company->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                    {{-- <form id="deleteForm" action="{{ route('admin.delete-company', $company->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                    </form> --}}
                                    <a href="{{ route('admin.delete-company', $company->id) }}"> <i class="fa fa-fw fa-trash-o"></i> </a>
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
