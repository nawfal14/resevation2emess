<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails de la réservation') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <h1>Détails de la réservation</h1>
        <div class="row">
            <div class="col">
                <p>Nom : {{ $reservation->user->firstname ?? 'Utilisateur inconnu' }} {{ $reservation->user->lastname ?? '' }}</p>
                <p>Spectacle : {{ $reservation->representation->show->title ?? 'Spectacle inconnu' }}</p>
                <p>Date de la représentation : {{ $reservation->representation->schedule ?? 'Date inconnue' }}</p>
                <p>Date de réservation : {{ $reservation->booking_date }}</p>
                <p>Statut : {{ $reservation->status }}</p>
                <p>Quantité : {{ $reservation->quantity }}</p>
                <p>Type prix : {{ $reservation->price->type }}</p>
                <p>Total : {{ $reservation->price->price * $reservation->quantity }} €</p>
                <a href="{{ route('reservations.index') }}" class="btn btn-primary">Retour à la liste</a>
            </div>
        </div>
    </div>
</x-app-layout>