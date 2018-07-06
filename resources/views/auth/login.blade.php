@extends('layouts.app')

@section('content')
<body class="login-page sidebar-collapse">
    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url({{ asset('img/bgRecife.jpg') }})"></div>
        <div class="container">

            @if ($errors->has('email') || $errors->has('password'))
                <div class="alert alert-danger" role="alert">
                    <div class="container">
                        <div class="alert-icon">
                            <i class="now-ui-icons objects_support-17"></i>
                        </div>
                        <strong>Eita!</strong> Usuário e senha inválidos!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </span>
                        </button>
                    </div>
                </div>
            @endif

            <div class="col-md-4 content-center">
                <div class="card card-login card-plain">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="header header-primary text-center">
                            <div class="logo-container">
                                <img src="{{ asset('img/now-logo.png') }}" alt="Nordestify">
                            </div>
                        </div>
                        <div class="content">
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </span>
                                <input id="email" type="email"
                                       class="form-control"
                                       name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons objects_key-25"></i>
                                </span>
                                <input id="password" type="password"
                                       class="form-control"
                                       name="password" required>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <input type="submit" class="btn btn-primary btn-round btn-lg btn-block" value="Entrar">
                        </div>
                        <div class="pull-left">
                            <h6>
                                <a href="{{ route('register') }}" class="link">Cadastro</a>
                            </h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
