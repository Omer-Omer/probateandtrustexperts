@extends('backend.layouts.master')
@push('header')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/codemirror/theme/monokai.css') }}">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/simplemde/simplemde.min.css') }}">

    <style>
        .delete-thumbnail-img {
            cursor: pointer;
        }

        .draggable-row {
            cursor: move;
        }
    </style>
@endpush
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Portfolio</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Portfolio</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Portfolio</h3>
                            <div class="text-end" style="text-align: end;">
                                <a class="add-custom-btn" href="{{ route('admin.portfolio.create') }}"><i class="fa fa-plus"></i> &nbsp;&nbsp; ADD</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Document</th>
                                        <th>Download Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($portfolio as $key => $pf)
                                        <tr class="draggable-row" id="row_{{ $pf->id }}"
                                            data-id="{{ $pf->id }}">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $pf->title ?? ''  }}</td>
                                            <td>
                                                <img height="50px" width="50px" src="{{ asset('/' . $pf->thumbnail) }}"
                                                    alt="">
                                            </td>
                                            <td>{{ $pf->document ?? ''  }}</td>
                                            <td>
                                                @if($pf->show_download_button == 1)
                                                    Show
                                                @else
                                                    Hide
                                                @endif
                                            </td>
                                            <td class="c-d-flex text-center">
                                                <a href="{{ route('admin.portfolio.edit', $pf->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                {{-- <a class="delete-thumbnail-img" data-id="{{ $pf->id }}"> <i
                                                        class="fa fa-fw fa-trash"></i> </a> --}}
                                                <a href="{{ route('admin.portfolio.delete', $pf->id) }}"> <i class="fa fa-fw fa-trash"></i> </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">No Record Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection


@push('footer')
    <!-- jQuery UI -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "pageLength": 30
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#example1 tbody').sortable({
                axis: 'y',
                update: function(event, ui) {
                    var order = [];
                    $('#example1 tbody tr').each(function() {
                        order.push($(this).data('id'));
                    });
                    // Send order to server via AJAX
                    $.ajax({
                        url: "{{ route('portfolio.updateOrder') }}",
                        method: "POST",
                        data: {
                            order: order
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Handle success
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                        }
                    });
                }
            }).disableSelection();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.delete-thumbnail-img').click(function() {
                var imageId = $(this).data('id');
                console.log('id: ' + imageId);

                $.ajax({
                    url: '/admin/aboutus/delete-img/' + imageId,
                    type: 'DELETE',
                    data: {
                        // Include CSRF token in the request data
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message
                        });
                        $('#row_' + imageId).remove();
                        // Remove the image from the DOM or perform any other action
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        });
                        console.error(xhr.responseText);
                        // Handle error
                    }

                });
            });
        });
    </script>
@endpush
