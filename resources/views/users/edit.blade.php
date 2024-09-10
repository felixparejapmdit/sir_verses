<!-- music_management/categories.blade.php -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Include jQuery before Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="username" :value="__('Username')" />
                            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="$user->username" required />
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>



                        <div class="mt-4 sm:hidden">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="mt-4 sm:hidden">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" />
                        </div>

                        <div class="flex mt-4">
                            <x-input-label for="login_enabled" :value="__('Login Enabled')" />
                            <input id="login_enabled" class="block mt-0 ml-3 mr-3" type="checkbox" name="login_enabled" {{ old('login_enabled', $user->activated ?? false) ? 'checked' : '' }} />
                            <span style="margin-top:-2px;margin-left:7px;font-size:14px;">This user can login</span>
                        </div>



                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="groups" :value="__('Groups')" />
                            <select id="groups" name="groups[]" multiple class="block mt-1 w-full">
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}" {{ $user->groups->contains($group) ? 'selected' : '' }}>{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                        @php
                                $cancelRoute = route('users.index');
                                if (strpos(url()->full(), 'group=') !== false) {
                                    $cancelRoute = route('groups.users', ['group' => $groupId]);
                                }
                            @endphp
                            <a href="{{ $cancelRoute }}" class="btn btn-secondary ml-2">
                                {{ __('Cancel') }}
                            </a>
                            <button class="btn btn-primary ml-2" style="height:40px;">
                            <i class="fas fa-check icon-white" aria-hidden="true"></i> Save Changes
                            </button>

                           

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
