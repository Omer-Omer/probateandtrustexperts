@extends('backend.layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Configuration</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Configuration</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Configuration</h3>
                    <div class="text-end" style="text-align: end;">
                        <a class="add-custom-btn" href="{{ route('configuration.create') }}"><i class="fa fa-plus"></i> &nbsp;&nbsp; ADD</a>
                    </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Key</th>
                                <th>Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($configurations as $k => $c)
                                <tr class="align-item-center">
                                    <td class="align-middle">{{ $k+1 }}</td>
                                    <td class="align-middle">{{ $c->key ?? 'n/a' }}</td>
                                    <td class="align-middle">{{ $c->value ?? 'n/a' }}</td>

                                    <td class="c-d-flex align-middle text-center">
                                        <a href="{{ route('configuration.edit', $c->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                        {{-- <form id="deleteForm" action="{{ route('c.destroy', $c->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                        <a onclick="document.getElementById('deleteForm').submit()"> <i class="fa fa-fw fa-trash-o"></i> </a>
                                        </form> --}}
                                        {{-- <a href="{{ route('admin.product.delete', $c->id) }}"> <i class="fa fa-fw fa-trash"></i> </a> --}}
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
              </div>
              <!-- /.card -->
              </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->


@endsection

@push('footer')
    <script>
        $(function () {
            $("#example1").DataTable({
            });
        });
  </script>
@endpush
