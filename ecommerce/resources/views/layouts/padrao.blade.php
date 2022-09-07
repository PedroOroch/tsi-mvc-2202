<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    @section('sidebar')
    ===================== BARRA SUPERIOR GERAL =======================
    @show
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
