@extends('includes.layout')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-4 offset-4">
            <h1 class="text-center mb-2">FutNaTV - Login</h1>
            <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Digite o e-mail:">
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Digite a senha:">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            </form>
        </div>
    </div>
</div>
@endsection