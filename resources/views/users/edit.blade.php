<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PATCH')

                        <!-- First Name -->
                        <div>
                            <x-input-label for="firstname" :value="__('First Name')" />
                            <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname"
                                :value="old('firstname', $user->firstname)" required autofocus />
                            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                        </div>

                        <!-- Last Name -->
                        <div class="mt-4">
                            <x-input-label for="lastname" :value="__('Last Name')" />
                            <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname"
                                :value="old('lastname', $user->lastname)" required />
                            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email', $user->email)" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Admin Status -->
                        <div class="mt-4">
                            <x-input-label for="is_admin" :value="__('Admin Status')" />
                            <select id="is_admin" name="is_admin" class="block mt-1 w-full">
                                <option value="0" {{ $user->is_admin ? '' : 'selected' }}>Regular User</option>
                                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
                            </select>
                            <x-input-error :messages="$errors->get('is_admin')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Save Changes') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>