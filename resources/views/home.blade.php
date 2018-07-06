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
                <div class="col-sm-6 col-lg-3">
                    <div class="input-group formSearchUser">
                        <input class="form-control" placeholder="Procurar usuários" type="text">
                        <span class="input-group-addon">
                            <i class="now-ui-icons ui-1_zoom-bold"></i>
                        </span>
                    </div>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">Meu Perfil</a>
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
    <div class="wrapper dashboard">
        <div class="page-header" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url({{ asset('img/bgRecife.jpg') }});">
            </div>
            <div class="container">
                <div class="content-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-search">
                                    <input type="text" placeholder="Procurar uma música..." class="inputSearch" autofocus>
                                </div>
                            </div>
                            <div class="col-md-12">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <a href="#button" class="btn btn-primary btn-round btn-lg">Gerar Recomendações</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
