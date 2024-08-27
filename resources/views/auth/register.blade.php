@extends('layouts.app')

@section('title', 'Artiste')

@section('content')

<div class="container">

    <h1>Inscription</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label for="register_email">Email</label>
            <input type="email" id="register_email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="register_login">Login</label>
            <input type="text" id="register_login" name="login" value="{{ old('login') }}" required>
        </div>
        <div>
            <label for="register_firstname">Prénom</label>
            <input type="text" id="register_firstname" name="firstname" value="{{ old('firstname') }}" required>
        </div>
        <div>
            <label for="register_lastname">Nom</label>
            <input type="text" id="register_lastname" name="lastname" value="{{ old('lastname') }}" required>
        </div>
        <div>
            <label for="register_password">Mot de passe</label>
            <input type="password" id="register_password" name="password" required>
        </div>
        <div>
            <label for="register_password_confirmation">Confirmer le mot de passe</label>
            <input type="password" id="register_password_confirmation" name="password_confirmation" required>
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
            <button type="submit">Inscription</button>
        </div>
    </form>

</div>

@endsection