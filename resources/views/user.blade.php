@extends("includes.layout")

@section("content")
@include("includes.menu")
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1>Usuários - FutNaTV</h1>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            @include('includes.errors')

            @if($user->id)
            <form action="{{ route('users-update', ['id' => $user->id]) }}" method="POST">
            {{ method_field("PUT") }}
            @else
            <form action="{{ route('users-store') }}" method="POST">
            @endif

                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome do usuário" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail do usuário" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="password">Senha (para deixar a senha atual, basta deixar este campo em branco)</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmar Senha</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection