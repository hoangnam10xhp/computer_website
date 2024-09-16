@extends('admin.admin')
    
@section('title')
<title>Admin - Banner</title>
@endsection

@section('content')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Starter Page</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Starter Page</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
    
                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <a href="{{route('banner.create')}}" class="btn btn-primary mb-3">Create</a>
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name Banner</th>
                                        <th>Image Banner</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($banner as $banner)
                                        <tr>
                                            <td>{{$banner->id}}</td>
                                            <td>{{$banner->title}}</td>
                                            <td><img src="{{ asset('storage/' . $banner->image_path) }}" alt="{{ $banner->title }}" width="100"></td>
                                            <td>{{$banner->link}}</td>
                                            <td>    
                                                <a href="/admin/banner/edit/{{ $banner->id }}" class="btn btn-warning btn-sm">Sửa</a>
                                                <a onclick="return confirm('Bạn có đồng ý xóa không?')" href="/admin/banner/delete/{{ $banner->id }}" class="btn btn-danger btn-sm">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.content-wrapper -->
@endsection