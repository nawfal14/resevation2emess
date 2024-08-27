@if(Auth::user() && Auth::user()->is_admin)
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reservations.index') }}">Reservations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('artists.index') }}">Artists</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shows.index') }}">Shows</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('representations.index') }}">Representations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('locations.index') }}">Locations</a>
                </li>
            </ul>
            <form class="form-inline ml-auto" action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
    </nav>

@elseif(Auth::user() && !Auth::user()->is_admin)
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">User Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shows.index') }}">Voir les shows</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('artists.index') }}">Voir les artistes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('representations.index') }}">Voir les représentations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reservations.index') }}">Voir les réservations</a>
                </li>
            </ul>
            <form class="form-inline ml-auto" action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
    </nav>
@endif
