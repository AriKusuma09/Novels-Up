<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--  Bootstrap Icon  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/assets/css/trix.css">
    <script type="text/javascript" src="/assets/js/trix.js"></script>
    
    <!--  My CSS  -->
    <link rel="stylesheet" href="/assets/css/style.css">
    

    <title>{{ $title }} | Novels Up</title>
    <link rel="icon" type="image/x-icon" href="/assets/img/icon/icon.png">


</head>
<body>
    



    <!--  My JS  -->
    <script src="/assets/js/script.js"></script>
    
    <!--  Bootstrap JS  -->
    <script src="/assets/js/bootstrap.min.js"></script>

</body>
</html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--  My CSS  -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">



    <title>Novels Up</title>


</head>

<body>

    @include('main.part.navbar')

        @yield('main')  

    @include('main.part.footer')

    

    <script>

        // Dark Mode
        if(localStorage.getItem('theme') == 'dark')
                setDarkMode()

            function setDarkMode() {

                let iconDarkMode = ''
                let isDark = document.body.classList.toggle('darkmode')
            
                if(isDark) {
                iconDarkMode = '<i class="bi bi-sun-fill"></i>'
                localStorage.setItem('theme', 'dark')
                } else {
                iconDarkMode = '<i class="bi bi-moon-fill"></i>'
                localStorage.removeItem('theme')
                }

                document.getElementById('darkButton').innerHTML = iconDarkMode

            }

    </script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <!--  My JS  -->
    <script src="/assets/js/script.js"></script>
    
    <!-- Sweet Alert  -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
      <script>
        Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
        })
      </script>
    @endif

    @if (session('failed'))
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ session('failed') }}',
        })
    </script>
    @endif

</body>

</html>