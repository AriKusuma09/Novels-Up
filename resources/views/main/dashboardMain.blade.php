<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>{{ $title }} | Novels Up Dashboard</title>
    <link rel="icon" type="image/x-icon" href="/assets/img/icon/icon.png">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    <!--  Bootstrap Icon  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"> 
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" >

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/assets/css/trix.css">
    <script type="text/javascript" src="/assets/js/trix.js"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      /* trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
      } */
      
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/assets/css/dashboard.css" rel="stylesheet">
  </head>
  <body>


    @include('main.part.sidebar')

    @yield('dashboard')

    <script>
      @yield('delete')
      // Image Preview
      function previewImage() {
          const image = document.querySelector('#image');
          const imgPreview = document.querySelector('.img-preview');

          imgPreview.style.display = 'block';

          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);

          oFReader.onload = function(oFREvent) {
              imgPreview.src = oFREvent.target.result;
          }
          }

        const title = document.querySelector("#name");
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g,"-");
            slug.value = preslug.toLowerCase();
        });

        // document.addEventListener('trix-file-accept', function(e) {
        //   e.preventDefault();
        // })
    </script>

    <script src="/assets/js/dashboard.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="/assets/js/bootstrap.bundle.min.js"></scrip>
      
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>

    @if (session('status'))
      <script>
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: '{{ session('status') }}',
          showConfirmButton: false,
          timer: 1150
        })
      </script>
    @endif

    @if (session('success'))
      <script>
        Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
      })
      </script>
   @endif
    

  </body>
</html>