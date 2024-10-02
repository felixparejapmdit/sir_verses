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
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Dropdown for filtering by district -->
                    <div class="form-group">
                        <label for="filterDistrictDropdown">Filter by District</label>
                        <select class="form-control" id="filterDistrictDropdown">
                            <option value="">Select District</option>
                            <!-- District options will be dynamically populated here -->
                        </select>
                    </div>

                    <div class="table-responsive" style="margin-top:20px;">
                        <!-- Table to display locale congregations -->
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
                            <tbody id="localeCongregationsTable">
                                <!-- Data will be dynamically inserted here -->
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
                <form id="addLocaleForm">
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
                                <!-- District options will be loaded here via AJAX -->
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
                <form id="editLocaleForm">
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
                                <!-- District options will be loaded here via AJAX -->
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
                <form id="deleteLocaleForm">
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

    <!-- Scripts -->
    <script>
        // Fetch districts and populate dropdowns
       function loadDistricts() {
    $.ajax({
        url: 'http://172.18.162.35/api/districts',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log('Districts API response:', response);  // Debugging

            let districtDropdown = $('#districtDropdown');
            let filterDistrictDropdown = $('#filterDistrictDropdown');
            districtDropdown.empty().append('<option value="">Select District</option>');
            filterDistrictDropdown.empty().append('<option value="">Select District</option>');

            // Check if response is an array (without a 'data' property)
            let districts = response.data || response.districts || response || [];

            if (districts.length) {
                // Assuming districts is an array of objects with id and name properties
                $.each(districts, function(index, district) {
                    let option = `<option value="${district.id}">${district.name}</option>`;
                    districtDropdown.append(option);
                    filterDistrictDropdown.append(option);
                });
            } else {
                console.error('Unexpected API response format for districts:', response);
            }
        },
        error: function(error) {
            console.error('Error fetching districts:', error);
            alert('Error fetching districts. Please check the API.');
        }
    });
}


        // Fetch locale congregations based on selected district using API
       function loadLocaleCongregations(districtId = '') {
    let url = 'http://172.18.162.35/api/localcongregations';
    if (districtId) {
        url += '?district_id=' + districtId; // Filter by district if provided
    }

    $.ajax({
        url: url,
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log('Locale Congregations API response:', response);  // Debugging

            let tableBody = '';
            // Similar approach: checking various structures of response
            let localeCongregations = response.data || response.congregations || response || [];

            if (localeCongregations.length) {
                $.each(localeCongregations, function(index, locale) {
                    tableBody += `
                        <tr>
                            <td style="text-align:center;">${index + 1}</td>
                            <td style="text-align:center;">${locale.name}</td>
                            <td style="text-align:center;">${locale.district ? locale.district.name : 'No District'}</td>
                            <td>
                                <a href="#" class="edit-box" data-id="${locale.id}" data-name="${locale.name}" data-district-id="${locale.district_id}" data-toggle="modal" data-target="#editLocaleModal">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="delete-box" data-id="${locale.id}" data-toggle="modal" data-target="#deleteLocaleModal">
                                    <i class="fas fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    `;
                });
            } else {
                tableBody = '<tr><td colspan="4" style="text-align:center;">No locale congregations found.</td></tr>';
            }
            $('#localeCongregationsTable').html(tableBody);
        },
        error: function(error) {
            console.error('Error fetching locale congregations:', error);
            alert('Error fetching locale congregations. Please check the API.');
        }
    });
}


        // Document ready function
        $(document).ready(function() {
            loadDistricts();
            loadLocaleCongregations();

            // Filter locale congregations by selected district
            $('#filterDistrictDropdown').on('change', function() {
                const districtId = $(this).val();
                loadLocaleCongregations(districtId);
            });

            // Add new locale congregation
            $('#addLocaleForm').on('submit', function(e) {
                e.preventDefault();
                let formData = {
                    name: $('#localeName').val(),
                    district_id: $('#districtDropdown').val()
                };
                $.ajax({
                    url: 'http://172.18.162.35/api/localcongregations',
                    method: 'POST',
                    data: JSON.stringify(formData),
                    contentType: 'application/json',
                    success: function() {
                        $('#addLocaleModal').modal('hide');
                        loadLocaleCongregations();
                    },
                    error: function(error) {
                        console.error('Error adding locale congregation:', error);
                        alert('Error adding locale congregation. Please try again.');
                    }
                });
            });

            // Edit locale congregation
            $(document).on('click', '.edit-box', function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var districtId = $(this).data('district-id');

                $('#editLocaleName').val(name);
                $('#editDistrictDropdown').val(districtId);

                $('#editLocaleForm').off('submit').on('submit', function(e) {
                    e.preventDefault();
                    let formData = {
                        name: $('#editLocaleName').val(),
                        district_id: $('#editDistrictDropdown').val()
                    };
                    $.ajax({
                        url: 'http://172.18.162.35/api/localcongregations/' + id,
                        method: 'PUT',
                        data: JSON.stringify(formData),
                        contentType: 'application/json',
                        success: function() {
                            $('#editLocaleModal').modal('hide');
                            loadLocaleCongregations();
                        },
                        error: function(error) {
                            console.error('Error updating locale congregation:', error);
                            alert('Error updating locale congregation. Please try again.');
                        }
                    });
                });
            });

            // Delete locale congregation
            $(document).on('click', '.delete-box', function () {
                var id = $(this).data('id');
                $('#deleteLocaleForm').off('submit').on('submit', function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: 'http://172.18.162.35/api/localcongregations/' + id,
                        method: 'DELETE',
                        success: function() {
                            $('#deleteLocaleModal').modal('hide');
                            loadLocaleCongregations();
                        },
                        error: function(error) {
                            console.error('Error deleting locale congregation:', error);
                            alert('Error deleting locale congregation. Please try again.');
                        }
                    });
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</x-app-layout>
