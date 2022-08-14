<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/assets/css/loginregister.css">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <title>{{ $title }} | Novels Up</title>
    <link rel="icon" type="image/x-icon" href="/assets/img/icon/icon.png">
    
</head>
<body>


    @yield('login-register')
        
    <!--  Bootstrap JS  -->
    <script src="/assets/js/bootstrap.min.js"></script>

</body>
</html>