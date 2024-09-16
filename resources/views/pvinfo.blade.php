<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pv Info Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="table-responsive" style="margin-top:80px;">
                        <!-- Add New PvInfo Button -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPvInfoModal" style="margin-bottom:20px;">
                            <i class="fas fa-plus"></i> Add Pv Info
                        </button>

                        <!-- PvInfo Table -->
                        <table class="table table-striped">
                            <caption>List of Pv Infos</caption>
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Event</th>
                                    <th>Event Type</th>
                                    <th>Event Date</th>
                                    <th>Event Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pvInfos as $pvInfo)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pvInfo->pvEvent->name }}</td>
                                        <td>{{ $pvInfo->pvEventType->name }}</td>
                                        <td>{{ $pvInfo->event_date }}</td>
                                        <td>{{ $pvInfo->event_location }}</td>
                                        <td>
                                            <a href="#" class="edit-box" data-id="{{ $pvInfo->id }}" data-event_id="{{ $pvInfo->pv_event_id }}" data-event_type_id="{{ $pvInfo->pv_event_type_id }}" data-event_date="{{ $pvInfo->event_date }}" data-event_location="{{ $pvInfo->event_location }}" data-toggle="modal" data-target="#editPvInfoModal">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="delete-box" data-id="{{ $pvInfo->id }}" data-toggle="modal" data-target="#deletePvInfoModal">
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

    <!-- Add PvInfo Modal -->
    <div class="modal fade" id="addPvInfoModal" tabindex="-1" aria-labelledby="addPvInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('pvinfo.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPvInfoModalLabel">Add New Pv Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pvEvent">Event</label>
                            <select class="form-control" id="pvEvent" name="pv_event_id" required>
                                @foreach($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pvEventType">Event Type</label>
                            <select class="form-control" id="pvEventType" name="pv_event_type_id" required>
                                @foreach($eventTypes as $eventType)
                                    <option value="{{ $eventType->id }}">{{ $eventType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="eventDate">Event Date</label>
                            <input type="date" class="form-control" id="eventDate" name="event_date" required>
                        </div>
                        <div class="form-group">
                            <label for="eventLocation">Event Location</label>
                            <input type="text" class="form-control" id="eventLocation" name="event_location" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Pv Info</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit PvInfo Modal -->
    <div class="modal fade" id="editPvInfoModal" tabindex="-1" aria-labelledby="editPvInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="editPvInfoForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPvInfoModalLabel">Edit Pv Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editPvEvent">Event</label>
                            <select class="form-control" id="editPvEvent" name="pv_event_id" required>
                                @foreach($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editPvEventType">Event Type</label>
                            <select class="form-control" id="editPvEventType" name="pv_event_type_id" required>
                                @foreach($eventTypes as $eventType)
                                    <option value="{{ $eventType->id }}">{{ $eventType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editEventDate">Event Date</label>
                            <input type="date" class="form-control" id="editEventDate" name="event_date" required>
                        </div>
                        <div class="form-group">
                            <label for="editEventLocation">Event Location</label>
                            <input type="text" class="form-control" id="editEventLocation" name="event_location" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Pv Info</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deletePvInfoModal" tabindex="-1" aria-labelledby="deletePvInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="deletePvInfoForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePvInfoModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this Pv Info?</p>
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
            var eventId = $(this).data('event_id');
            var eventTypeId = $(this).data('event_type_id');
            var eventDate = $(this).data('event_date');
            var eventLocation = $(this).data('event_location');

            // Set the form fields with current data
            $('#editPvEvent').val(eventId);
            $('#editPvEventType').val(eventTypeId);
            $('#editEventDate').val(eventDate);
            $('#editEventLocation').val(eventLocation);

            // Update the form action URL dynamically
            $('#editPvInfoForm').attr('action', '/pvinfo/' + id);
        });

        // Populate Delete Modal with PvInfo ID and Update Form Action URL
        $(document).on('click', '.delete-box', function () {
            var id = $(this).data('id');
            $('#deletePvInfoForm').attr('action', '/pvinfo/' + id);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</x-app-layout>
