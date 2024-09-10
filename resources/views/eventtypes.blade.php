
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Event Types Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   
                
                <div class="table-responsive" style="margin-top:80px;">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#boxModal" style="margin-bottom:20px;">
            <i class="fas fa-plus"></i> Event Type<!-- Font Awesome box-plus icon -->
        </button>

        <table class="table table-striped">
        <caption>List of events</caption>
            <thead class="table-dark"> 
                <tr>
                    <th style="width:2%;text-align:center;">#</th>
                    <th style="width:20%;text-align:center;">Name</th>
                    <th style="width:2%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventtypes as $eventtype) 
                <tr>
                    <td style="text-align:center;">{{ $loop->iteration }}</td>
                    <td style="text-align:center;">{{ $eventtype->name }}</td>
                    <td>
                        @if ($eventtype)
                            <a href="#" class="edit-box" data-id="{{ $eventtype->id }}" data-name="{{ $eventtype->name }}"  data-toggle="modal" data-target="#editBoxModal" style="display: inline-block;">
                                <i class="fas fa-edit"></i>
                            </a>
                        
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
