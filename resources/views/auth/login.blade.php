@extends('layouts.app')

@section('title', 'Artiste')

@section('content')

<div class="container">

    <h1>Connexion</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="login">Login</label>
            <input type="text" id="login" name="login" value="{{ old('login') }}" required autofocus>
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            <button type="submit">Connexion</button>
        </div>
    </form>

</div>

@endsection