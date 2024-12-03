<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .pagination svg {
            width: 50px;
            height: 50px;
        }

        .pagination svg {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('subir.index') }}">Upload File App</a>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>

</html>