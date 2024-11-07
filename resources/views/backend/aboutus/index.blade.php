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
                    <h1>About Us</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">About Us</li>
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

                    <form action="{{ route('admin.about-us.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Banner Image --}}
                        <section class="content">
                            <div class="container-fluid">
                                <!-- SELECT2 EXAMPLE -->
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">About Us Page</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                    </button> --}}
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body" style="display: block;">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea id="summernote_1" name="description">
                                                        {{ old('description', $aboutus->description ?? '') }}
                                                    </textarea>

                                                    @error('description')
                                                        <span class="alert alert-danger p-3 custom-alert-d"> {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <div class="card-footer" style="padding: 0px; background-color:transparent;">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                                <!-- /.card -->
                        </section>

                    </form>

                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection


@push('footer')

    <!-- Summernote -->
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script>
        $(function() {
            // Summernote
            $('#summernote_1').summernote({
                height: 300,
            });
        });
    </script>

    <!-- jQuery UI -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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
                        url: "{{ route('aboutus.updateOrder') }}",
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
    </script> --}}
@endpush
