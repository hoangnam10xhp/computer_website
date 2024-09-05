@extends('admin.admin')
 
@section('title')
<title>Admin - Product/Edit</title>
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
                                <h2 class="card-title">Update New</h2>
                                <br>
                                <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select class="form-control" id="category_id" name="category_id" required>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Mô tả</label>
                                        <textarea type="text" class="form-control" id="editor" name="description" required> {{ old('description', $product->description) }} </textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="price" class="form-label">Giá</label>
                                        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price}}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="thumbnail" class="form-label">Hình ảnh sản phẩm</label>
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="Current Image" width="150">
                                        </div>
                                        <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="img/*">
                                    </div>

                                    <div class="mt-3">
                                        @foreach ($product->images as $image)
                                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image" width="100" multiple>
                                        @endforeach
                                        <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple>
                                    </div>
                                    <br>
                                    <button type="submit" onclick="return confirm('Bạn có đồng ý sửa không?')" class="btn btn-primary">Sửa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.content-wrapper -->
@endsection