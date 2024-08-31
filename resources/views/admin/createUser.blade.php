<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf


                        <div>
                            <x-input-label for="firstname" :value="__('First Name')" />
                            <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" required
                                autofocus />
                            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                        </div>


                        <div class="mt-4">
                            <x-input-label for="lastname" :value="__('Last Name')" />
                            <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname"
                                required />
                            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                        </div>


                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="login" :value="__('Login')" />
                            <x-text-input id="login" class="block mt-1 w-full" type="text" name="login" required />
                            <x-input-error :messages="$errors->get('login')" class="mt-2" />
                        </div>


                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>


                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>


                        <div class="mt-4">
                            <x-input-label for="is_admin" :value="__('Admin Status')" />
                            <select id="is_admin" name="is_admin" class="block mt-1 w-full">
                                <option value="0">Regular User</option>
                                <option value="1">Admin</option>
                            </select>
                            <x-input-error :messages="$errors->get('is_admin')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Create User') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>