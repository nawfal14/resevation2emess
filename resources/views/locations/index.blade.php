<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des lieux') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
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
    <div class="mt-4">
        {{ $locations->links() }}
    </div>
</x-app-layout>