@extends('backend.layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Company Contact List
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Company Contact List</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Company Contact List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Company Name</th>
                                <th>Person Name</th>
                                <th>Person Email</th>
                                <th>Phone No</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($company_contact_list as $key => $contact)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $contact->company->name ?? 'n/a' }}</td>
                                <td>{{ $contact->name ?? 'n/a' }}</td>
                                <td>{{ $contact->email ?? 'n/a' }}</td>
                                <td>{{ $contact->phone_no ?? 'n/a' }}</td>
                                <td>{{ $contact->comment ?? 'n/a' }}</td>
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
