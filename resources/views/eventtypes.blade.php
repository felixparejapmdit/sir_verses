<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<x-app-layout>
    <style>
        .bg-gray-100 {
            background: linear-gradient(to bottom, #FFFFFF, #EEEEEE);
            background-size: 100% 100vh;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }

        /* Styling for buttons and modal headers */
        .btn-primary {
            background-color: #4a90e2;
            border-color: #4a90e2;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #357ABD;
            border-color: #357ABD;
            transform: scale(1.05);
        }

        .modal-header {
            background-color: #4a90e2;
            color: white;
        }

        .modal-footer .btn {
            transition: all 0.3s ease;
        }

        .modal-footer .btn-danger:hover {
            background-color: #c82333;
        }

        /* Adding more modern hover effect for table rows */
        .table tbody tr:hover {
            background-color: #f2f2f2;
            transition: background-color 0.3s ease;
        }

        /* Customizing table */
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        /* Adjust margin and centering of the table */
        .table-responsive {
            margin-top: 60px;
        }

        /* Improving the layout of modal content */
        .modal-body label {
            font-weight: bold;
        }

        /* Extra spacing and improved typography */
        .table caption {
            caption-side: top;
            font-size: 1.25rem;
            font-weight: bold;
            color: #4a90e2;
        }

        .btn {
            padding: 10px 20px;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Event Types Page') }}
        </h2>
    </x-slot>

            <x-slot name="header">
        <div class="flex justify-between items-center my-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories Management') }}
            </h2>
            <div>
                
            <a href="{{ route('admin.settings') }}" class="btn btn-secondary">Back</a>
                        <!-- Add New Event Type Button -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEventTypeModal">
                        <i class="fas fa-plus"></i> Event Type
                    </button>
        </div>
</x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
           

                    <!-- Event Type Table -->
                    <div class="table-responsive" style="margin-top:80px;">
                        <table class="table table-striped">
                            <caption>List of event types</caption>
                            <thead class="table-dark">
                                <tr>
                                    <th style="width:2%;text-align:center;">#</th>
                                    <th style="width:20%;text-align:center;">Event</th>
                                    <th style="width:20%;text-align:center;">Event Type</th>
                                    <th style="width:35%;text-align:center;">Description</th>
                                    <th style="width:2%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($eventtypes as $eventtype)
                                    <tr>
                                        <td style="text-align:center;">{{ $loop->iteration }}</td>
                                        <td style="text-align:center;">{{ $eventtype->pvEvent->name }}</td> <!-- Event Name from Relation -->
                                        <td style="text-align:center;">{{ $eventtype->name }}</td>
                                        <td style="text-align:center;">{{ $eventtype->description }}</td>
                                        <td>
                                            <a href="#" class="edit-box" data-id="{{ $eventtype->id }}" data-name="{{ $eventtype->name }}" data-description="{{ $eventtype->description }}" data-event_id="{{ $eventtype->pv_event_id }}" data-toggle="modal" data-target="#editEventTypeModal">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="delete-box" data-id="{{ $eventtype->id }}" data-toggle="modal" data-target="#deleteEventTypeModal">
                                                <i class="fas fa-trash text-danger"></i>
                                            </a>
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

     <!-- Add Event Type Modal -->
     <div class="modal fade" id="addEventTypeModal" tabindex="-1" aria-labelledby="addEventTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('eventtypes.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEventTypeModalLabel">Add New Event Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="event_id">Select Event</label>
                            <select class="form-control" id="event_id" name="pv_event_id" required>
                                @foreach ($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="eventTypeName">Event Type Name</label>
                            <input type="text" class="form-control" id="eventTypeName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="eventTypeDescription">Event Type Description</label>
                            <textarea class="form-control" id="eventTypeDescription" name="description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Event Type</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Event Type Modal -->
    <div class="modal fade" id="editEventTypeModal" tabindex="-1" aria-labelledby="editEventTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="editEventTypeForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editEventTypeModalLabel">Edit Event Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editEvent_id">Select Event</label>
                            <select class="form-control" id="editEvent_id" name="pv_event_id" required>
                                @foreach ($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editEventTypeName">Event Type Name</label>
                            <input type="text" class="form-control" id="editEventTypeName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="editEventTypeDescription">Event Type Description</label>
                            <textarea class="form-control" id="editEventTypeDescription" name="description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Event Type</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteEventTypeModal" tabindex="-1" aria-labelledby="deleteEventTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="deleteEventTypeForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteEventTypeModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this event type?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Populate Edit Modal with Data and Update Form Action URL
        $(document).on('click', '.edit-box', function () {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var description = $(this).data('description');
            var event_id = $(this).data('event_id');

            // Set the form fields with current data
            $('#editEventTypeName').val(name);
            $('#editEventTypeDescription').val(description);
            $('#editEvent_id').val(event_id);

            // Update the form action URL dynamically
            $('#editEventTypeForm').attr('action', '/eventtypes/' + id);
        });

        // Populate Delete Modal with Event ID and Update Form Action URL
        $(document).on('click', '.delete-box', function () {
            var id = $(this).data('id');
            // Update the form action URL dynamically with the event ID
            $('#deleteEventTypeForm').attr('action', '/eventtypes/' + id);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</x-app-layout>
