<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form action="{{ route('panel.login') }}" method="post">
            @csrf
            <div>
                <div>
                    <label class="form-label" for="username">Username</label>
                </div>
                <input class="form-control" type="text" name="username" id="username">
            </div>
            <div class="pt-2">
                <div>
                    <label class="form-label" for="password">Password</label>
                </div>
                <input class="form-control" type="password" name="password" id="password">
            </div>
            <button class="btn btn-outline-primary w-100 mt-3" type="submit">Submit</button>
            <div class="pt-2"><a href="{{ route('panel.register.page') }}">Register</a></div>
        </form>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
