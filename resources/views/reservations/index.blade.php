@extends('layouts.app')

@section('title', 'Artiste')

@section('content')

<div class="container mt-5">
    <h1>Liste des réservations</h1>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Nom de l'utilisateur</th>
                <th scope="col">Spectacle</th>
                <th scope="col">Date de la représentation</th>
                <th scope="col">Date de réservation</th>
                <th scope="col">Statut</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix Type</th>
                <th scope="col">Prix Total</th>
                <th scope="col">Détails</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->user->firstname ?? 'Utilisateur inconnu' }}
                        {{ $reservation->user->lastname ?? '' }}
                    </td>
                    <td>{{ $reservation->representation->show->title ?? 'Spectacle inconnu' }}</td>
                    <td>{{ $reservation->representation->schedule ?? 'Date inconnue' }}</td>
                    <td>{{ $reservation->booking_date }}</td>
                    <td>{{ $reservation->status }}</td>
                    <td>{{ $reservation->quantity}}</td>
                    <td>{{ $reservation->price->type}}</td>
                    <td>{{ $reservation->price->price * $reservation->quantity }}</td>
                    <td><a href="{{ route('reservations.show', $reservation->id) }}">Voir</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection