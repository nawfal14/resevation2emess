<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Warm Welcome Message -->
            @if(Auth::user()->is_admin)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-bold">Welcome, Admin!</h3>
                        <p>Here you can manage the application.</p>
                    </div>
                </div>

                <!-- Card: Manage Users -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-bold">Manage Users</h3>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $user->name }}</td>
                                        <td class="border px-4 py-2">{{ $user->email }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Card: Number of Users -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-bold">Total Users</h3>
                        <p>{{ $users_count }}</p>
                    </div>
                </div>

                <!-- Card: Number of Shows -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-bold">Total Shows</h3>
                        <p>{{ $shows_count }}</p>
                    </div>
                </div>

                <!-- Card: Manage Shows -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-bold">Manage Shows</h3>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Title</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($shows as $show)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $show->title }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('shows.edit', $show->id) }}" class="text-blue-500">Edit</a>
                                            <form action="{{ route('shows.destroy', $show->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 ml-2">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('shows.create') }}" class="text-blue-500 mt-2 inline-block">Add New Show</a>
                    </div>
                </div>

                <!-- Card: Manage Artists -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-bold">Manage Artists</h3>
                        <ul class="list-disc pl-5">
                            @foreach($artists as $artist)
                                <li>{{ $artist->firstname }} {{ $artist->lastname }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Card: Number of Artists -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-bold">Total Artists</h3>
                        <p>{{ $artists_count }}</p>
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-bold">Welcome, {{ Auth::user()->name }}!</h3>
                        <p>We're glad to see you back!</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>