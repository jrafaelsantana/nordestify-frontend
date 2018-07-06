@extends('layouts.app')

@section('content')

    <body class="profile-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="20">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="{{ route('home') }}">
                    Nordestify
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation"
                 data-nav-image="{{ asset('img/blurred-image-1.jpg') }}">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Avaliar Músicas</a>
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
            <div class="page-header-image" data-parallax="true"
                 style="background-image: url({{ asset('img/bgRecife.jpg') }});">
            </div>
            <div class="container">
                <div class="content-center">
                    <div class="photo-container">
                        <img src="uploads/avatars/{{ $user->avatar }}" alt="{{ $user->name }}">
                    </div>
                    <h3 class="title">{{ $user->name }}
                        <button class="btn btn-icon btn-icon-mini btnConf" data-toggle="modal"
                                data-target="#atualizarPerfil">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                        </button>
                    </h3>

                </div>
            </div>
        </div>
        @if (isset($statusAtualizacao) && !$statusAtualizacao)
            <div class="alert alert-danger" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="now-ui-icons objects_support-17"></i>
                    </div>
                    <strong>Eita!</strong> Aconteceu algo e não foi possível atualizar seu perfil!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </span>
                    </button>
                </div>
            </div>
        @endif
        @if (isset($statusAtualizacao) && $statusAtualizacao)
            <div class="alert alert-success" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="now-ui-icons objects_support-17"></i>
                    </div>
                    <strong>Boa!</strong> Perfil atualizado!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </span>
                    </button>
                </div>
            </div>
        @endif

        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <h4 class="title text-center">Últimas Avaliações</h4>
                    </div>
                    <div class="col-md-8 ml-auto mr-auto">
                        <table class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                            </thead>
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
                            </tbody>
                        </table>
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

    <!-- Modal Core -->
    <div class="modal fade" id="atualizarPerfil" tabindex="-1" role="dialog" aria-labelledby="atualizarPerfil"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form enctype="multipart/form-data" action="{{ route('updateProfile') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="atualizarPerfilLabel">Atualizar Perfil</h4>
                    </div>
                    <div class="modal-body">
                        <div class="input-group form-group-no-border">
                                    <span class="input-group-addon">
                                                <i class="now-ui-icons users_circle-08"></i>
                                            </span>
                            <input class="form-control" value="{{ $user->name }}" name="name" id="name" type="text"
                                   required>
                        </div>
                        <div class="input-group form-group-no-border">
                                    <span class="input-group-addon">
                                                <i class="now-ui-icons ui-1_email-85"></i>
                                            </span>
                            <input class="form-control" value="{{ $user->email }}" name="email" id="email" type="email"
                                   required>
                        </div>
                        <div class="input-group form-group-no-border">
                            <span class="input-group-addon">
                                                <i class="now-ui-icons design_image"></i>
                                            </span>
                            <input type="file" class="form-control" name="avatar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info btn-simple">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
@endsection
