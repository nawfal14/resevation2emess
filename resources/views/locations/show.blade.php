<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $location->designation }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <h1>{{ $location->designation }}</h1>
        <p>Adresse : {{ $location->address }}</p>
        <p>Localité : {{ $location->locality->locality }}</p>
        <a href="{{ route('locations.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</x-app-layout>