<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Admin</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link rel="stylesheet" href="public/font/bootstrap-icons.css">
    <!-- Bootstrap core CSS -->
    <link 
      href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" 
      rel="stylesheet" 
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
      crossorigin="anonymous"
    >
    <!-- Favicons -->
    <link 
      rel="apple-touch-icon" 
      href="https://getbootstrap.com/docs/5.0/assets/img/favicons/apple-touch-icon.png" 
      sizes="180x180"
    >
    <link
      rel="icon" 
      href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-32x32.png" 
      sizes="32x32" 
      type="image/png"
    >
    <link 
      rel="icon" 
      href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-16x16.png" 
      sizes="16x16" 
      type="image/png"
    >
    <link 
      rel="manifest" 
      href="https://getbootstrap.com/docs/5.0/assets/img/favicons/manifest.json"
    >
    <link
      rel="mask-icon" 
      href="https://getbootstrap.com/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" 
      color="#7952b3"
    >
    <link 
      rel="icon" 
      href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon.ico"
    >
    <meta name="theme-color" content="#7952b3">

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
      </style>

      <!-- Custom styles for this template -->
      <link 
        href="https://getbootstrap.com/docs/5.0/examples/sidebars/sidebars.css" 
        rel="stylesheet"
      >
  </head>
  <body>


    <div class="container">
      <div class="row">
        <div class="col-5"> @yield('sidebar') </div>
        <div class="col-7" style="background-color: #F8F9FA;"> @yield('content') </div>
      </div>
    </div>


    <!-- JS files -->
    <script 
      src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
      crossorigin="anonymous"
    ></script>
    <script 
      src="https://getbootstrap.com/docs/5.0/examples/sidebars/sidebars.js"
    ></script>

  </body>
</html>