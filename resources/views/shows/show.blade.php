@extends('layouts.app')

@section('title', 'Artiste')

@section('content')

<div class="container mt-5">
    <h1>{{ $show->title }} </h1>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Info</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Slug:</b> {{ $show->slug }}</li>
                <li class="list-group-item"><b>Title:</b> {{ $show->title }}</li>
                <li class="list-group-item"><b>Duration:</b> {{ $show->duration }} mins</li>
                <li class="list-group-item"><b>Description:</b> {{ $show->description }}</li>
            </ul>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h2 class="card-title">Artistes</h2>
            <ul class="list-group list-group-flush">
                @foreach($show->artists as $artist)
                    <li class="list-group-item">
                        <a href="{{ route('artists.show', $artist->id) }}">
                            {{ $artist->firstname }} {{ $artist->lastname }}
                        </a>
                        <ul>
                            @foreach($artist->types as $type)
                                @if($type->pivot->show_id == $show->id)
                                    <li>Type: {{ $type->type }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h2 class="card-title">Representations</h2>
            @foreach($show->representations as $rep)
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Date:</b> {{ $rep->schedule }}</li>
                    <li class="list-group-item"><b>Lieu:</b> {{ $rep->location->slug ?? 'non défini' }}</li>
                </ul>
            @endforeach
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <a href="{{ route('shows.index') }}" class="btn btn-secondary btn-block">Retour</a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('reservations.create', $show->id) }}" class="btn btn-primary btn-block">Réserver</a>
        </div>
    </div>
</div>

@endsection