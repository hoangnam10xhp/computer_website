    @extends('admin.admin')
    
    @section('title')
    <title>Admin - Banner/Edit</title>
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
                                    <form action="{{ route('banner.update', ['id' => $banner->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="title" class="form-label">Tên Banner</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ $banner->title }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="image_url" class="form-label">Hình ảnh Banner</label>
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $banner->image_url) }}" alt="Image" width="150">
                                            </div>
                                            <input type="file" class="form-control-file" id="image_url" name="image_url" accept="image/*">
                                        </div>

                                        <div class="mb-3">
                                            <label for="link" class="form-label">Link</label>
                                            <input type="text" class="form-control" id="link" name="link" value="{{ $banner->link }}" required>
                                        </div>

                                        <button type="submit" onclick="return confirm('Bạn có đồng ý sửa không?')" class="btn btn-primary">Sửa</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.content-wrapper -->
    @endsection