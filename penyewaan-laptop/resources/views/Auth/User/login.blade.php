<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"
        integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section class="login d-flex ">
        <div class="login-right ">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 " src="{{ URL('img/laptop2.jpg') }}"
                            alt="First slide" style="height: 120vh">
                    </div>
                </div>
            </div>
        </div>
        <div class="login-left ">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-6">
                    <div class="header">
                        <h1>Selamat Datang Di Aplikasi Peminjaman Laptop</h1>
                        <p>Selamat Datang dan Isi Email Dan Password</p>
                    </div>
                    <div class="login-form">
                        <form action="{{ route('loginUser') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="email" name="email"
                                    aria-describedby="emailHelp" placeholder="Masukan Email"
                                    value="{{ old('email') }}">
                                <span class="text-danger">@error("email") {{ $message }} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukan Password" value="{{ old('password') }}">
                                <span class="text-danger">@error("password") {{ $message }} @enderror</span>
                            </div>
                            <button type="submit" class="btn btn-primary" name="login">User Login</button>
                        </form>
                        <span>Belum Punya akun? <a href="{{ URL('register') }}"
                                class="text-decoration-none">Daftar Disini</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"
        integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if(Session::has("Fail"))
        <script>
            swal("Gagal", "{!! Session::get('Fail') !!}", "error", {
                button: "OK",
            });

        </script>
    @endif
    @if(Session::has("Success"))
        <script>
            swal("Selamat", "{!! Session::get('Success') !!}", "success", {
                button: "OK",
            });

        </script>
    @endif


</body>

</html>
