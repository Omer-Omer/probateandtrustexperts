@extends('backend.layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Blog
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Blog</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Blog List</h3>
                    <a href="{{ route('admin.blog.create') }}">
                        <button class="btn " style="float: right;">ADD <i class="fa fa-fw fa-plus"></i></button>
                    </a>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Sr#</th>
                            <th>Title</th>
                            <th>Thumbnail</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($blog_list as $key => $blog)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $blog->pageheading ?? 'n/a' }}</td>
                                <td>
                                    <img height="100" width="100" src="{{ asset('/'.$blog->image) }}">
                                </td>

                                <td>
                                    @if($blog->status == 1)
                                        <span>Publish</span>
                                    @else
                                        <span>Draft</span>
                                    @endif
                                </td>
                                <td class="c-d-flex">
                                    <a href="{{ route('admin.blog.edit', $blog->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                    {{-- <form id="deleteForm" action="{{ route('admin.faq.destroy', $faq->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                       <a onclick="document.getElementById('deleteForm').submit()"> <i class="fa fa-fw fa-trash-o"></i> </a>
                                    </form> --}}
                                    <a href="{{ route('admin.blog.delete', $blog->id) }}"> <i class="fa fa-fw fa-trash-o"></i> </a>

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
