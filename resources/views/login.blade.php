<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .img-custom {
            width: 100%; /* Đảm bảo hình ảnh chiếm toàn bộ chiều rộng */
            height: 80vh; /* Đặt chiều cao hình ảnh bằng chiều cao của viewport */
            object-fit: cover; /* Cắt và điều chỉnh hình ảnh để giữ tỷ lệ phù hợp */
            border-radius: 1rem 0 0 1rem; /* Bo góc cho hình ảnh */
        }
    </style>
</head>

<body>
    <section class="vh-100" 
    style="
    background-image:url({{asset('img/bg.jpg')}});
    background-repeat: no-repeat;
    background-size: cover;

    ">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-9">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="https://i.pinimg.com/736x/23/cf/c4/23cfc4bf3f2ee5fa6913e2c35b9d8523.jpg"
                                    alt="login form" class="img-fluid img-custom" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-6 text-black">
                                    <form id="login-form" class="form" action="{{ route('admin.postlogin') }}" method="POST">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-6" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Computer Website</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng nhập vào tài khoản của bạn</h5>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" name="email" class="form-control form-control-lg" required />
                                            <label class="form-label" for="email">Địa chỉ Email</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="password" name="password"
                                                class="form-control form-control-lg" required />
                                            <label class="form-label" for="password">Mật khẩu</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Đăng nhập</button>
                                        </div>

                                        <a class="small text-muted" href="#!">Bạn quên mật khẩu?</a>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Không có tài khoản? <a
                                                href="#!" style="color: #393f81;">Đăng ký ở đây</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
