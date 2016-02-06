<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">

</head>
<body>
    <nav class="menu">
        <div class="icone-fechar"></div>
        <ul>
            <li>
                <a href="#" title="Sobre">Sobre</a>
            </li>
            <li>
                <a href="#" title="Enviar Link">Enviar Links</a>
            </li>
            <li>
                <a href="#" title="Contato">Contato</a>
            </li>
        </ul>
    </nav>
    <header class="topo">
        <div class="logo"></div>
        <div class="navegacao-topo">
        <div class="container">
            <div class="container-topo">
            <div class="icone-menu"></div>
            <div class="icone-buscar"></div>
            </div>
        </div>
        </div>
    </header>
    <main class="container">
        @yield('content')
    </main>
    <script src="{{ asset('assets/js/scripts.min.js') }}"></script>
</body>
</html>
