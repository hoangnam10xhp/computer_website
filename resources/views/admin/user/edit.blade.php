@extends('admin.admin')
 
@section('title')
<title>Admin - Users/Edit</title>
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
                                <form action="{{ route('users.update', ['id' => $users->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ $users->email }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Mật khẩu mới</label>
                                        <input type="password" class="form-control" id="password" name="password"   >
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