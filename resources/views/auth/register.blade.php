@extends('layouts.app')

@section('content')
    <body class="login-page sidebar-collapse">
    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url({{ asset('img/bgRecife.jpg') }})"></div>
        <div class="container">

            @if ($errors->has('name') || $errors->has('password') || $errors->has('email'))
            <div class="alert alert-danger" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="now-ui-icons objects_support-17"></i>
                    </div>
                    <strong>Eita!</strong> Preencha o formulário corretamente e tente novamente!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </span>
                    </button>
                </div>
            </div>
            @endif


            <div class="row content-center">
                <div class="card card-signup" data-background-color="orange">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" autocomplete="off">
                        @csrf
                        <div class="header text-center">
                            <h4 class="title title-up">Cadastro</h4>
                        </div>
                        <div class="card-body">
                            <div class="input-group form-group-no-border">
                                <span class="input-group-addon">
                                            <i class="now-ui-icons users_circle-08"></i>
                                        </span>
                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nome" name="name" id="name" type="text" required>
                            </div>
                            <div class="input-group form-group-no-border">
                                <span class="input-group-addon">
                                            <i class="now-ui-icons objects_key-25"></i>
                                        </span>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Senha" required>
                            </div>
                            <div class="input-group form-group-no-border">
                                <span class="input-group-addon">
                                            <i class="now-ui-icons objects_key-25"></i>
                                        </span>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar senha" required>
                            </div>
                            <div class="input-group form-group-no-border">
                                <span class="input-group-addon">
                                            <i class="now-ui-icons ui-1_email-85"></i>
                                        </span>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <input type="submit" class="btn btn-neutral btn-round btn-lg" value="Cadastrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    </body>
@endsection
