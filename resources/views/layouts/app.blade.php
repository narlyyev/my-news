<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>My news • @yield('title')</title>

  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

  @stack('css')

  <style>
      .main {
          display: flex;
          flex-direction: column;
          min-height: 100vh;
      }

      .content {
          flex-grow: 1;
      }

      .footer {
          margin-top: auto;
      }
  </style>
</head>
<body style="background-color: rgba(217,215,215,0.18);">
<div class="main">
  <div>
    @include('customer.shared.nav')
  </div>
  <div class="content pb-5 pb-lg-0" id="content">
    <div class="container-xl pb-4 pb-lg-0">
      @yield('content')
    </div>
  </div>
  <div class="footer">
    @include('customer.shared.footer')
  </div>
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

@stack('js')

</body>
</html>
