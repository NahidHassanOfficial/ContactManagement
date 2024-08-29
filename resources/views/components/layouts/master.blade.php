<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/js/app.js')
    @vite('resources/sass/app.scss')

    <script src="{{ asset('js/config.js') }}"></script>
    <script src="{{ asset('js/toastify.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    <script src="{{ asset('js/fontawesome.all.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/toastify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.all.min.css') }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/progress.css') }}">

</head>

<body class="d-flex justify-content-center mt-5">


    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>

    {{ $slot }}


</body>

</html>
