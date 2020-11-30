@extends("includes.layout")

@section("content")
@include("includes.menu")
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1>Jogos - FutNaTV</h1>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            @include('includes.errors')

            @if($match->id)
            <form action="{{ route('matches-update', ['id' => $match->id]) }}" method="POST">
            {{ method_field("PUT") }}
            @else
            <form action="{{ route('matches-store') }}" method="POST">
            @endif

                {{ csrf_field() }}
                <div class="form-group">
                    <label for="team1">Time 1</label>
                    <input type="text" class="form-control" id="team1" name="team1" placeholder="Nome do primeiro time" value="{{ $match->team1 }}">
                </div>
                <div class="form-group">
                    <label for="team2">Time 2</label>
                    <input type="text" class="form-control" id="team2" name="team2" placeholder="Nome do segundo time" value="{{ $match->team2 }}">
                </div>
                <div class="form-group">
                    <label for="date">Data</label>
                    <input type="datetime-local" class="form-control" id="date" name="date" value="{{ $match->date }}">
                </div>
                <div class="from-group">
                    <h4>Canais</h4>
                    @foreach($channels as $channel)
                        <div class="form-check form-check-inline">
                            @if($match->channels()->find($channel->id))
                                <input type="checkbox" class="form-check-input" name="channels[]" id="channels{{ $channel->id }}" value="{{ $channel->id }}" checked>
                            @else
                                <input type="checkbox" class="form-check-input" name="channels[]" id="channels{{ $channel->id }}" value="{{ $channel->id }}">
                            @endif
                            <label for="channels{{ $channel->id }}" class="form-check-label">{{ $channel->name }}</label>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection