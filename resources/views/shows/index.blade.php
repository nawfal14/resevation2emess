<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artiste') }}
        </h2>
    </x-slot>

    <div class="container mt-5">

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
            <div class="p-6 text-gray-900">
                <h3 class="text-xl font-bold">
                    Liste des spectacles</h3>
            </div>
        </div>
        <div class="row" style="width: 100%; display: flex; flex-direction: row; gap: 10px;">
            @foreach ($shows as $show)
                <div class="card" style="width: 280px; height: 480px;">
                    <div style="width: 100%; height: 70%; overflow: hidden;">
                        <img src="{{ asset('images' . $show->poster_url) }}" alt="{{ $show->title }}"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="card-body"
                        style="height: 30%; display: flex; flex-direction: column; justify-content: center;">
                        <h5 class="card-title">{{ $show->title }}</h5>
                        <a href="{{ route('shows.show', $show->id) }}" class="btn btn-primary">Voir détails</a>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</x-app-layout>