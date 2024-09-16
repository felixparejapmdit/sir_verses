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
            {{ __('Create New Group') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


    <form method="POST" action="{{ route('groups.store') }}">
        @csrf

        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('groups.index') }}" class="btn btn-secondary">Cancel</a>
            <x-primary-button class="ml-2" style="background-color:#007bff;height:39px;">
            <i class="fas fa-check icon-white" aria-hidden="true"></i>{{ __('Save') }}
            </x-primary-button>
        </div>
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
    <x-input-label for="permissions" :value="__('Permissions')" />
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Permission</th>
                    <th>Grant</th>
                    <th>Deny</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissionsArray as $categoryName => $groupPermissions)
                    <tr class="header-row">
                        <td colspan="3"><strong>{{ $categoryName }}</strong></td>
                    </tr>
                    @foreach ($groupPermissions as $permission => $description)
                        <tr>
                            <td>{{ $description }}</td>
                            <td>
                                <input type="radio" name="permissions[{{ $permission }}]" value="1" {{ old("permissions.$permission") == '1' ? 'checked' : '' }}>
                            </td>
                            <td>
                                <input type="radio" name="permissions[{{ $permission }}]" value="0" {{ old("permissions.$permission", '0') == '0' ? 'checked' : '' }}>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    <x-input-error :messages="$errors->get('permissions')" class="mt-2" />
</div>


<div class="flex items-center justify-end mt-4">
            <a href="{{ route('groups.index') }}" class="btn btn-secondary">Cancel</a>
            <x-primary-button class="ml-2" style="background-color:#007bff;height:39px;">
            <i class="fas fa-check icon-white" aria-hidden="true"></i>{{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</div>
</div>
</div>
</div>
    
</x-app-layout>