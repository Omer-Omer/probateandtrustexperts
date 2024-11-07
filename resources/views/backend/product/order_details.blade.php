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
        padding: 5px 25px;
        border-radius: 15px;
        color: white;
    }
    .t-heading {
        font-weight: bold;
    }
</style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Order Details</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.orders') }}">Orders</a></li>
                <li class="breadcrumb-item active">Orders Details</li>
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
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 mb-3">
                                    @if ($order->status == 0)
                                        <span class="pending-status">Pending</span>
                                    @elseif($order->status == 1)
                                        <span class="approve-status">Approved</span>
                                    @elseif($order->status == 2)
                                        <span class="cancel-status">Cancelled</span>
                                    @elseif($order->status == 3)
                                        <span class="deliver-status">Delivered</span>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <span class="d-flex align-item-center">
                                        <span class="mr-3 t-heading"> Customer Name: </span>
                                        <p class="mr-3"> {{ $order->first_name .' '. $order->last_name  }} </p>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <span class="d-flex">
                                        <span class="mr-3 t-heading"> Order#  </span>
                                        <p> {{ $order->id }} </p>
                                    </span>
                                </div>
                                <div class="col-12">
                                    <span class="d-flex">
                                        <span class="mr-3 t-heading"> Phone No:  </span>
                                        <p> {{ $order->phone }} </p>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <span class="d-flex align-item-center">
                                        <span class="mr-3 t-heading"> Country: </span>
                                        <p> {{ $order->country  }} </p>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <span class="d-flex">
                                        <span class="mr-3 t-heading"> City:  </span>
                                        <p> {{ $order->city }} </p>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <span class="d-flex align-item-center">
                                        <span class="mr-3 t-heading"> State: </span>
                                        <p> {{ $order->state  }} </p>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <span class="d-flex">
                                        <span class="mr-3 t-heading"> Post Code:  </span>
                                        <p> {{ $order->post_code }} </p>
                                    </span>
                                </div>
                                <br>
                                <div class="col-6">
                                    <span class="d-flex">
                                        <span class="mr-3 t-heading"> Total Price:  </span>
                                        <p> {{ $order->total_price }} </p>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Order Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Sku</th>
                                <th>Qty.</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $key => $product)
                            {{-- @php echo '<pre>'; print_r($p); @endphp --}}
                            {{-- @foreach ($p as $product) --}}
                                    <tr class="align-item-center">
                                        <td class="align-middle">{{ $key+1 }}</td>
                                        <td><img class="img-fluid" height="50" width="50" src="{{ isset($product->thumbnail_image) ? asset('/'.$product->thumbnail_image) : '' }}"></td>
                                        <td>
                                            {{ $product->title ?? 'n/a' }}
                                        </td>
                                        <td class="align-middle">{{ $product->product_category->name ?? 'n/a' }}</td>
                                        <td class="align-middle">{{ $product->product_sub_category->name ?? 'n/a' }}</td>
                                        <td class="align-middle">{{ $product->sku ?? 'n/a' }}</td>
                                        <td class="align-middle">{{ $product->qty ?? 'n/a' }}</td>
                                        <td class="align-middle">{{ $product->price ?? 'n/a' }}</td>

                                    </tr>
                                {{-- @endforeach --}}
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
