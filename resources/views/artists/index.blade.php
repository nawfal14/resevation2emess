<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des artistes') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <h1>Liste des artistes</h1>
        <div class="list-group">
            @foreach ($artists as $artist)
                <a href="{{ route('artists.show', $artist->id) }}" class="list-group-item list-group-item-action">
                    {{ $artist->firstname }} {{ $artist->lastname }}
                </a>
            @endforeach
        </div>
    </div>
    <div class="mt-4">
        {{ $artists->links() }}
    </div>
</x-app-layout>