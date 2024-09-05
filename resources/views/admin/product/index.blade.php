@extends('admin.admin')
    
@section('title')
<title>Admin - Product</title>
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
                            <a href="{{route('product.create')}}" class="btn btn-primary mb-3">Create</a>
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Chọn danh mục</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Mô tả</th>
                                        <th>Giá</th>
                                        <th>Hình ảnh</th>
                                        <th>Hình ảnh chi tiết</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->category->name}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{!! $product->description !!}</td>
                                            <td>{{$product->price}}</td>
                                            <td>
                                                @if($product->thumbnail)
                                                    <img src="{{ asset('storage/' . $product->thumbnail) }}" width="100" height="100" alt="Thumbnail">
                                                @endif
                                            </td>
                                            <td>
                                                @foreach($product->images as $image)
                                                    <img src="{{ asset('storage/' . $image->image_path) }}" width="100" height="100" alt="Product Image">
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="/admin/product/edit/{{ $product->id }}" class="btn btn-warning btn-sm">Sửa</a>
                                                <a onclick="return confirm('Bạn có đồng ý xóa không?')" href="/admin/product/delete/{{ $product->id }}" class="btn btn-danger btn-sm">Xóa</a>
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