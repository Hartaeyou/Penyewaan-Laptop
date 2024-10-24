<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL('css/register.css') }}">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Register</h5>
                <div class="login-form">
                    <form action="{{ route('registerUser') }}" method="post">
                        @csrf
                        <div class="mt-2">
                            <label for="Name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="Name" name="Name" placeholder="Name" value="{{old('Name')}}">
                            <span class="text-danger">@error("Name") {{$message}} @enderror</span>
                        </div>
                        <div class="mt-2">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" value="{{old('email')}}">
                            <span class="text-danger">@error("email") {{$message}} @enderror</span>
                        </div>
                        <div class="mt-2">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{old('password')}}">
                            <span class="text-danger">@error("password") {{$message}} @enderror</span>
                        </div>
                        <div class="mt-2">
                            <label for="Phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="Phone" name="Phone" placeholder="Phone" value="{{old('Phone')}}">
                            <span class="text-danger">@error("Phone") {{$message}} @enderror</span>
                        </div>
                        <div class="mt-2">
                            <label for="Address" class="form-label">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="Address" name="Address" placeholder="Address" value="{{old('Address')}}">
                            <span class="text-danger">@error("Address") {{$message}} @enderror</span>
                        </div>
                        
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary " name="login">Register</button>
                        </div>
                    </form>
                    <div class="d-flex justify-content-center mt-2">
                        <span>Sudah Memiliki Akun? <a href="{{ route('viewLoginUser') }}" class="text-decoration-none">Login Disini</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>