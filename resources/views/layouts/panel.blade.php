<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        My News - @yield('title')
    </title>
    <link rel="stylesheet" href="{{ asset('admin/css/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendor/dropify/dist/dropify.min.css') }}">
    <style>
        .dataTables_paginate .paginate_button {
            padding: 10px 15px;
            margin: -8px 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f8f9fa;
            color: #007bff;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
            text-decoration: none;
        }

        .dataTables_paginate .paginate_button:hover {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .dataTables_paginate .paginate_button.current {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
            font-weight: bold;
        }

        .dataTables_paginate .paginate_button.first,
        .dataTables_paginate .paginate_button.last {
            display: none;
        }

    </style>
    @stack('css')
</head>
<body id="page-top">
<div id="wrapper">
    @include('panel.shared.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('panel.shared.navbar')

            @yield('content')
        </div>
        @include('panel.shared.footer')
    </div>
</div>

<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/dragAndDrop.js') }}"></script>
<script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendor/datatables/select2.min.js') }}"></script>
<script src="{{ asset('admin/vendor/dropify/dist/dropify.min.js') }}"></script>
<script>
    $('.display').DataTable();
</script>
@stack('js')
</body>
</html>
