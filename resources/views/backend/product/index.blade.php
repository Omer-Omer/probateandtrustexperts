@extends('backend.layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Product</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Product</li>
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
                        <h3 class="card-title">Product</h3>
                        <div class="text-end" style="text-align: end;">
                            <a class="add-custom-btn" href="{{ route('product.create') }}"><i class="fa fa-plus"></i> &nbsp;&nbsp; ADD</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Product</th>
                                {{-- <th>Company</th> --}}
                                <th>Category</th>
                                <th>Thumbnail Image</th>
                                <th>Show card</th>
                                <th>Show Detail Page</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $key => $product)
                                <tr class="align-item-center">
                                    <td class="align-middle">{{ $key+1 }}</td>
                                    <td class="align-middle">{{ $product->title ?? 'n/a' }}</td>
                                    {{-- <td class="align-middle">{{ $product->company->name ?? 'n/a' }}</td> --}}
                                    <td class="align-middle">{{ $product->product_category->name ?? 'n/a' }}</td>
                                    <td><img class="img-fluid" height="50" width="50" src="{{ isset($product->thumbnail_image) ? asset('/'.$product->thumbnail_image) : '' }}"></td>

                                    <td class="align-middle">
                                        {{ ($product->show_on_card == 1) ? 'Yes' : 'no' }}
                                    </td>
                                    <td class="align-middle">
                                        {{ ($product->show_on_page == 1) ? 'Yes' : 'no' }}
                                    </td>

                                    <td class="align-middle">{{ $product->created_at ?? 'n/a' }}</td>


                                    <td class="c-d-flex align-middle text-center">
                                        <a href="{{ route('product.edit', $product->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                        {{-- <form id="deleteForm" action="{{ route('product.destroy', $product->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                        <a onclick="document.getElementById('deleteForm').submit()"> <i class="fa fa-fw fa-trash-o"></i> </a>
                                        </form> --}}
                                        <a href="{{ route('admin.product.delete', $product->id) }}"> <i class="fa fa-fw fa-trash"></i> </a>
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
