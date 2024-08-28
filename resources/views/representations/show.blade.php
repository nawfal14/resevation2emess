<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails de la Représentation') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <h1>{{ $representation->show->title }}</h1>
        <p>Date et heure : {{ $representation->schedule }}</p>
        <p>Lieu : {{ $representation->location->slug ?? '' }}</p>
        <div class="row">
            <div class="col">
                <a href="{{ route('reservations.create', $representation->show_id) }}" class="btn btn-primary">Créer une réservation</a>
                <a href="{{ route('representations.index') }}" class="btn btn-secondary">Retour à la liste</a>
            </div>
        </div>
    </div>
</x-app-layout>