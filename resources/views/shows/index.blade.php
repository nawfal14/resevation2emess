@extends('layouts.app')

@section('title', 'Artiste')

@section('content')

<div class="container mt-5">
    <h1>Liste des spectacles</h1>
    <div class="row">
        @foreach ($shows as $show)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $show->poster_url }}" class="card-img-top" alt="{{ $show->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $show->title }}</h5>
                        <a href="{{ route('shows.show', $show->id) }}" class="btn btn-primary">Voir détails</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection