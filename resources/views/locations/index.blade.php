@extends('layouts.app')

@section('title', 'Artiste')

@section('content')

<div class="container">
    <h1>Liste des lieux</h1>
    <ul class="list-group">
        @foreach ($locations as $location)
            <li class="list-group-item">
                <a href="{{ route('locations.show', $location->id) }}">
                    {{ $location->designation }} - {{ $location->locality->locality }}
                </a>
            </li>
        @endforeach
    </ul>
</div>

@endsection