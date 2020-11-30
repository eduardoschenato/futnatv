<div class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="#" class="navbar-brand">FutNaTV</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nvbcontent">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nvbcontent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="{{ route('matches-list') }}" class="nav-link">Jogos</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('channels-list') }}" class="nav-link">Canais</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('users-list') }}" class="nav-link">Usuários</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">Sair</a>
            </li>
        </ul>
    </div>
</div>