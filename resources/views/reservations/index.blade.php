<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des réservations') }}
        </h2>
    </x-slot>

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
                        <td>{{ $reservation->price ? $reservation->price->type : 0}}</td>
                        <td>{{ $reservation->price ? $reservation->price->price * $reservation->quantity : 0 }}</td>
                        <td><a href="{{ route('reservations.show', $reservation->id) }}">Voir</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $reservations->links() }}
        </div>
    </div>
</x-app-layout>