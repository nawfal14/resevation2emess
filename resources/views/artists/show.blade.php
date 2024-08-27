@extends('layouts.app')

@section('title', 'Artiste')

@section('content')

<div class="container">
    <h1>{{ $artist->firstname }} {{ $artist->lastname }}</h1>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Spectacles</h2>
            <ul class="list-group list-group-flush">
                @foreach ($artist->shows as $show)
                    <li class="list-group-item">
                        <a href="{{ route('shows.show', $show->id) }}">{{ $show->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <a href="{{ route('artists.index') }}" class="btn btn-primary mt-3">Retour à la liste</a>
</div>

@endsection