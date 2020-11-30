@extends("includes.layout")

@section("content")
@include("includes.menu")
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1>Canais - FutNaTV</h1>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            @include('includes.errors')

            @if($channel->id)
            <form action="{{ route('channels-update', ['id' => $channel->id]) }}" method="POST" enctype="multipart/form-data">
            {{ method_field("PUT") }}
            @else
            <form action="{{ route('channels-store') }}" method="POST" enctype="multipart/form-data">
            @endif

                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome do canal" value="{{ $channel->name }}">
                </div>
                <div class="form-group">
                    <label for="logo">Logo (para manter o arquivo antigo, basta não inserir nenhum arquivo neste campo)</label>
                    <input type="file" class="form-control" id="logo" name="logo">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection