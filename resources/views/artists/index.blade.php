@extends('layouts.app')

@section('title', 'Liste des artistes')

@section('content')

<div class="container">
    <h1>Liste des artistes</h1>
    <div class="list-group">
        @foreach ($artists as $artist)
            <a href="{{ route('artists.show', $artist->id) }}" class="list-group-item list-group-item-action">
                {{ $artist->firstname }} {{ $artist->lastname }}
            </a>
        @endforeach
    </div>
</div>

@endsection