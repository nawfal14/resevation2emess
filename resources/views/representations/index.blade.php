<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des représentations') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <h1>Liste des représentations</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Spectacle</th>
                    <th scope="col">Date</th>
                    <th scope="col">Lieu</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($representations as $representation)
                    <tr>
                        <td>{{ $representation->show->title ?? '' }}</td>
                        <td>{{ $representation->schedule ?? 'Date inconnue' }}</td>
                        <td>{{ $representation->location->slug ?? '' }}</td>
                        <td><a href="{{ route('representations.show', $representation->id) }}"
                                class="btn btn-primary">Voir</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>