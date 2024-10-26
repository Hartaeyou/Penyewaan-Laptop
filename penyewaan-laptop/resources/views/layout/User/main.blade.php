<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('css')
    <link rel="stylesheet" href="{{ URL('css/header.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-default/default.css">


</head>

<body>
    @include('layout.User.header')
    <h1></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    @if($errors->any())
        <script>
            let errorMessage = `<ul>`; <
            blade foreach | % 20( % 24 errors - % 3 Eall() % 20 as % 20 % 24 error) >
                errorMessage += `{{ $error }}<br>`; <
            /blade endforeach>
            errorMessage += `</ul>`;

            Swal.fire({
                title: "Validation Error",
                html: errorMessage,
                icon: "error",
                button: "OK",
            });

        </script>
    @endif

    @if(Session::has("Fail"))
        <script>
            Swal.fire({
                title: "Gagal",
                text: "{!! Session::get('Fail') !!}",
                icon: "error",
                button: "OK",
            });

        </script>
    @endif

    @if(Session::has("Success"))
        <script>
            Swal.fire({
                title: "Selamat",
                text: "{!! Session::get('Success') !!}",
                icon: "success",
                button: "OK",
            });

        </script>
    @endif



</body>

</html>
