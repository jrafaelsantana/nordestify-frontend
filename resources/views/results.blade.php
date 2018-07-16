@extends('layouts.app')

@section('content')

    <body class="profile-page sidebar-collapse">
    <input type="hidden" id="idUser" name="idUser" value="{{ $user->id }}">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="20">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="{{ route('home') }}">
                    Nordestify
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="{{ asset('img/blurred-image-1.jpg') }}">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Avaliar Músicas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('musics') }}">Todas as Músicas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header page-header-small" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url({{ asset('img/bgRecife.jpg') }});">
            </div>
            <div class="container">
                <div class="content-center">
                    <h1>Recomendações</h1>
                </div>
            </div>
        </div>
        <div id="resultados" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <h4 class="title text-center">Músicas Recomendadas</h4>
                    </div>
                    <div class="col-md-12 ml-auto mr-auto">
                        <div id="resultadosMusicas" class="row">
                            <div id="carregandoMusicas" class="carregando"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <h4 class="title text-center">Perfis Semelhantes</h4>
                    </div>
                    <div class="col-md-12 ml-auto mr-auto">
                        <div class="row" id="resultadosUsuarios">
                            <div id="carregandoUsuarios" class="carregando"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer footer-default">
            <div class="container">
                <div class="copyright">
                    Universidade Federal Rural de Pernambuco
                </div>
            </div>
        </footer>
    </div>
    </body>
@endsection

@section('scripts')
    <script src="{{ asset('js/recomendacao.js') }}" type="text/javascript"></script>
@endsection