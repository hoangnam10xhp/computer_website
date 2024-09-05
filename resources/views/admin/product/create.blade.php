@extends('admin.admin')
 
@section('title')
<title>Admin - Product/Create</title>
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
                    <div class="d-flex justify-content-center align-items-center" style="height: 100%; padding-top: 56px;">
                        <div class="card w-50">
                            <div class="card-body">
                                <h2 class="card-title">Create New</h2>
                                <br>
                                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Chọn danh mục</label>
                                        <select class="form-control" name="category_id" required>
                                            <option disabled selected>
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Mô tả</label>
                                        <textarea type="text" class="form-control" id="editor" name="description" placeholder="Nhập mô tả sản phẩm" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="price" class="form-label">Giá</label>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá sản phẩm" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="thumbnail" class="form-label">Hình ảnh sản phẩm</label>
                                        <input type="file" class="form-control-file" id="thumbnail" name="thumbnail" accept="image/*" placeholder="Nhập hình ảnh sản phẩm" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="images" class="form-label">Hình ảnh chi tiết</label>
                                        <input type="file" class="form-control-file" id="images" name="images[]" accept="image/*" multiple>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Tạo mới</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.content-wrapper -->
@endsection