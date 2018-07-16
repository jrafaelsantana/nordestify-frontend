@extends('layouts.app')

@section('content')
<body class="profile-page">
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
                        <a class="nav-link" href="{{ route('profile') }}">Meu Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('results') }}">Ver Recomendações</a>
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
            <div class="page-header-image" data-parallax="true" style="background-image: url('{{ asset('img/bgRecife.jpg') }}');">
            </div>
            <div class="container">
                <div class="content-center">
                    <form>
                        <input type="text" placeholder="Procurar uma música..." class="inputSearch" id="pesquisaMusica" autocomplete="off">
                    </form>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <h4 class="title text-center">Resultados da Pesquisa <span class="badge badge-success" id="countResult">3</span></h4>
                    </div>
                    <div class="col-md-10 ml-auto mr-auto">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-hover tabela-pesquisa">
                            <tbody id="resultadoTabela">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

@section('scripts')
    <script src="{{ asset('js/search.js') }}" type="text/javascript"></script>
@endsection