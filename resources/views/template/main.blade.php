<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Pix </title>

        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    </head>
    <body class="">
        <nav class="navbar">
            <div class="logo">
                <img src="{{asset('img/laravel.svg')}}" alt="Logo">
                <Label>Laravel Pix </Label>
            </div>
            <div class="user-icon" title="Usuário Logado"></div>
        </nav>
        <div class="container">
                @yield('content')
        </div>
        </body>
</html>
