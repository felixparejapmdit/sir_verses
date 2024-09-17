<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Locale Congregations Page') }}
        </h2>
    </x-slot>

                           <x-slot name="header">
        <div class="flex justify-between items-center my-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories Management') }}
            </h2>
            <div>
                
            <a href="{{ route('admin.settings') }}" class="btn btn-secondary">Back</a>
                   <!-- Add New Locale Congregation Button -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addLocaleModal">
                            <i class="fas fa-plus"></i> Locale Congregation
                        </button>

        </div>
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="table-responsive" style="margin-top:80px;">
                   

                        <!-- Locale Congregations Table -->
                        <table class="table table-striped">
                            <caption>List of Locale Congregations</caption>
                            <thead class="table-dark">
                                <tr>
                                    <th style="width:2%;text-align:center;">#</th>
                                    <th style="width:20%;text-align:center;">Name</th>
                                    <th style="width:20%;text-align:center;">District</th>
                                    <th style="width:2%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($localeCongregations as $locale)
                                    <tr>
                                        <td style="text-align:center;">{{ $loop->iteration }}</td>
                                        <td style="text-align:center;">{{ $locale->name }}</td>
                                        <td style="text-align:center;">{{ $locale->district->name }}</td> <!-- Display District Name -->
                                        <td>
                                            <a href="#" class="edit-box" data-id="{{ $locale->id }}" data-name="{{ $locale->name }}" data-district-id="{{ $locale->district_id }}" data-toggle="modal" data-target="#editLocaleModal">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="delete-box" data-id="{{ $locale->id }}" data-toggle="modal" data-target="#deleteLocaleModal">
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

    <!-- Add Locale Congregation Modal -->
    <div class="modal fade" id="addLocaleModal" tabindex="-1" aria-labelledby="addLocaleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('locale_congregations.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addLocaleModalLabel">Add New Locale Congregation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="localeName">Locale Name</label>
                            <input type="text" class="form-control" id="localeName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="districtDropdown">District</label>
                            <select class="form-control" id="districtDropdown" name="district_id" required>
                                <option value="">Select District</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Locale</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Locale Congregation Modal -->
    <div class="modal fade" id="editLocaleModal" tabindex="-1" aria-labelledby="editLocaleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="editLocaleForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLocaleModalLabel">Edit Locale Congregation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editLocaleName">Locale Name</label>
                            <input type="text" class="form-control" id="editLocaleName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="editDistrictDropdown">District</label>
                            <select class="form-control" id="editDistrictDropdown" name="district_id" required>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Locale</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteLocaleModal" tabindex="-1" aria-labelledby="deleteLocaleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="deleteLocaleForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteLocaleModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this locale congregation?</p>
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
            var districtId = $(this).data('district-id');
            
            // Set the form fields with current data
            $('#editLocaleName').val(name);
            $('#editDistrictDropdown').val(districtId);

            // Update the form action URL dynamically
            $('#editLocaleForm').attr('action', '/locale_congregations/' + id);
        });

        // Populate Delete Modal with Locale ID and Update Form Action URL
        $(document).on('click', '.delete-box', function () {
            var id = $(this).data('id');
            $('#deleteLocaleForm').attr('action', '/locale_congregations/' + id);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</x-app-layout>
