<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Districts Page') }}
        </h2>
    </x-slot>

                        <x-slot name="header">
        <div class="flex justify-between items-center my-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories Management') }}
            </h2>
            <div>
                
            <a href="{{ route('admin.settings') }}" class="btn btn-secondary">Back</a>
                   <!-- Add New District Button -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDistrictModal">
                            <i class="fas fa-plus"></i> District
                        </button>

        </div>
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="table-responsive" style="margin-top:80px;">
                   

                        <!-- Districts Table -->
                        <table class="table table-striped">
                            <caption>List of districts</caption>
                            <thead class="table-dark">
                                <tr>
                                    <th style="width:2%;text-align:center;">#</th>
                                    <th style="width:20%;text-align:center;">Name</th>
                                    <th style="width:2%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($districts as $district)
                                    <tr>
                                        <td style="text-align:center;">{{ $loop->iteration }}</td>
                                        <td style="text-align:center;">{{ $district->name }}</td>
                                        <td>
                                            <a href="#" class="edit-box" data-id="{{ $district->id }}" data-name="{{ $district->name }}" data-toggle="modal" data-target="#editDistrictModal">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="delete-box" data-id="{{ $district->id }}" data-toggle="modal" data-target="#deleteDistrictModal">
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

    <!-- Add District Modal -->
    <div class="modal fade" id="addDistrictModal" tabindex="-1" aria-labelledby="addDistrictModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('districts.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDistrictModalLabel">Add New District</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="districtName">District Name</label>
                            <input type="text" class="form-control" id="districtName" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save District</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit District Modal -->
    <div class="modal fade" id="editDistrictModal" tabindex="-1" aria-labelledby="editDistrictModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="editDistrictForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editDistrictModalLabel">Edit District</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editDistrictName">District Name</label>
                            <input type="text" class="form-control" id="editDistrictName" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update District</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteDistrictModal" tabindex="-1" aria-labelledby="deleteDistrictModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="deleteDistrictForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteDistrictModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this district?</p>
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
            $('#editDistrictName').val(name);
            $('#editDistrictForm').attr('action', '/districts/' + id);
        });

        // Populate Delete Modal with District ID and Update Form Action URL
        $(document).on('click', '.delete-box', function () {
            var id = $(this).data('id');
            $('#deleteDistrictForm').attr('action', '/districts/' + id);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</x-app-layout>
