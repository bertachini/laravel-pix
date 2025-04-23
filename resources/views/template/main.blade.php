<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('title')
        <link rel="icon" href="{{asset('img/laravel.svg')}}" type="image/x-icon">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
              integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
              crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        @yield('css')
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark display-flex">
            <div class="container-fluid logo">
                <a class="navbar-brand" href="/">
                    <img src="{{asset('img/laravel.svg')}}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Caçapay
                </a>
                <div class="d-flex nav-bar">
                    @yield('nav')
                </div>
                <div class="user">
                    @yield('user')
                </div>
            </div>
        </nav>
        <div class="container mt-3">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @yield('content')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{asset('js/notify.js')}}"></script>
        <script >
            let notify;
            @if (session('notify'))
                notify = @php echo json_encode(session('notify')); @endphp;
                console.log(notify);
                if (notify.length > 1){
                    notify.map((item) => {
                        addNotify(item.type, item.message);
                    });
                }else{
                    addNotify(notify.type, notify.message);
                }

            @endif

        </script>
         @stack('scripts')
    </body>
</html>
