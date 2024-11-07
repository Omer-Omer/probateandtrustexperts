@extends('backend.layouts.master')

@section('content')
<style>
    .pending-status {
        background-color: #5353d8;
    }
    .approve-status{
        background-color: green;
    }
    .cancel-status {
        background-color: red;
    }
    .deliver-status {
        background-color: #008078;
    }
    .pending-status, .approve-status, .cancel-status, .deliver-status {
        padding: 5px 15px;
        border-radius: 15px;
        color: white;
    }
    .small-status span {
        padding: 2px 7px;
        margin-right: 5px;
    }
</style>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Order</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Order</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Order</h3>
                        {{-- <div class="text-end" style="text-align: end;">
                            <a class="add-custom-btn" href="{{ route('product.create') }}"><i class="fa fa-plus"></i> &nbsp;&nbsp; ADD</a>
                        </div> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Cutomer Name</th>
                                <th>Phone</th>
                                {{-- <th>Adress</th> --}}
                                <th>City</th>
                                <th>Country</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $key => $o)
                                <tr class="align-item-center">
                                    <td class="align-middle">{{ $key+1 }}</td>

                                    <td class="align-middle">

                                        <span class="ml-1 small-status">
                                            @if ($o->status == 0)
                                                <span class="pending-status">P</span>
                                            @elseif($o->status == 1)
                                                <span class="approve-status">A</span>
                                            @elseif($o->status == 2)
                                                <span class="cancel-status">C</span>
                                            @elseif($o->status == 3)
                                                <span class="deliver-status">D</span>
                                            @endif
                                        </span>
                                        {{ $o->first_name .' '. $o->last_name }}
                                    </td>
                                    <td class="align-middle">{{ $o->phone }}</td>
                                    {{-- <td class="align-middle">{{ $o->address_one }}</td> --}}
                                    <td class="align-middle">{{ $o->city }}</td>
                                    <td class="align-middle">{{ $o->country }}</td>
                                    <td class="align-middle">{{ $o->total_price }}</td>
                                    <td class="c-d-flex align-middle text-center">
                                        <a class="approve-status" href="{{ route('product.order.status', ['id' => $o->id, 'status' => 1]) }}">Approve</a>
                                        <a class="cancel-status" href="{{ route('product.order.status', ['id' => $o->id, 'status' => 2]) }}">Cancel</a>
                                        <a class="deliver-status" href="{{ route('product.order.status', ['id' => $o->id, 'status' => 3]) }}">Deliver</a>
                                    </td>
                                    <td class="c-d-flex align-middle text-center">
                                        <a href="{{ route('product.order.details', $o->id) }}"><i class="fa fa-fw fa-eye"></i> Order Details</a>
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
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection

@push('footer')
    <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
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
