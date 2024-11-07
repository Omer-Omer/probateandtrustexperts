@extends('backend.layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Category</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
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
                        <h3 class="card-title">Category</h3>
                        <div class="text-end" style="text-align: end;">
                            <a class="add-custom-btn" href="{{ route('product.category.create') }}"><i class="fa fa-plus"></i> &nbsp;&nbsp; ADD</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Title</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($product_categories as $key => $category)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $category->name ?? 'n/a' }}</td>
                                <td class="c-d-flex text-center">
                                    <a href="{{ route('product.category.edit', $category->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                    <a href="{{ route('product.category.delete', $category->id) }}"> <i class="fa fa-fw fa-trash"></i> </a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No Record Found</td>
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
