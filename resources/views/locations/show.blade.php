@extends('layouts.app')

@section('title', 'Artiste')

@section('content')

<div class="container mt-5">
    <h1>{{ $location->designation }}</h1>
    <p>Adresse : {{ $location->address }}</p>
    <p>Localité : {{ $location->locality->locality }}</p>
    <a href="{{ route('locations.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>

@endsection