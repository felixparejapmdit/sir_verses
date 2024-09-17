<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Translations Page') }}
        </h2>
    </x-slot>

                     <x-slot name="header">
        <div class="flex justify-between items-center my-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories Management') }}
            </h2>
            <div>
                
            <a href="{{ route('admin.settings') }}" class="btn btn-secondary">Back</a>
                       <!-- Add New Translation Button -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTranslationModal">
                            <i class="fas fa-plus"></i> Translation
                        </button>

        </div>
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="table-responsive" style="margin-top:80px;">
                  

                        <!-- Translations Table -->
                        <table class="table table-striped">
                            <caption>List of Translations</caption>
                            <thead class="table-dark">
                                <tr>
                                    <th style="width:2%;text-align:center;">#</th>
                                    <th style="width:20%;text-align:center;">Abbreviation</th>
                                    <th style="width:35%;text-align:center;">Name</th>
                                    <th style="width:2%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($translations as $translation)
                                    <tr>
                                        <td style="text-align:center;">{{ $loop->iteration }}</td>
                                        <td style="text-align:center;">{{ $translation->abbrev }}</td>
                                        <td style="text-align:center;">{{ $translation->name }}</td>
                                        <td>
                                            <a href="#" class="edit-box" data-id="{{ $translation->id }}" data-abbrev="{{ $translation->abbrev }}" data-name="{{ $translation->name }}" data-toggle="modal" data-target="#editTranslationModal">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="delete-box" data-id="{{ $translation->id }}" data-toggle="modal" data-target="#deleteTranslationModal">
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

    <!-- Add Translation Modal -->
    <div class="modal fade" id="addTranslationModal" tabindex="-1" aria-labelledby="addTranslationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('translations.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTranslationModalLabel">Add New Translation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="translationAbbrev">Abbreviation</label>
                            <input type="text" class="form-control" id="translationAbbrev" name="abbrev" required>
                        </div>
                        <div class="form-group">
                            <label for="translationName">Translation Name</label>
                            <input type="text" class="form-control" id="translationName" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Translation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Translation Modal -->
    <div class="modal fade" id="editTranslationModal" tabindex="-1" aria-labelledby="editTranslationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="editTranslationForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTranslationModalLabel">Edit Translation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editTranslationAbbrev">Abbreviation</label>
                            <input type="text" class="form-control" id="editTranslationAbbrev" name="abbrev" required>
                        </div>
                        <div class="form-group">
                            <label for="editTranslationName">Translation Name</label>
                            <input type="text" class="form-control" id="editTranslationName" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Translation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteTranslationModal" tabindex="-1" aria-labelledby="deleteTranslationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="deleteTranslationForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteTranslationModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this translation?</p>
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
            var abbrev = $(this).data('abbrev');
            var name = $(this).data('name');

            // Set the form fields with current data
            $('#editTranslationAbbrev').val(abbrev);
            $('#editTranslationName').val(name);

            // Update the form action URL dynamically
            $('#editTranslationForm').attr('action', '/translations/' + id);
        });

        // Populate Delete Modal with Translation ID and Update Form Action URL
        $(document).on('click', '.delete-box', function () {
            var id = $(this).data('id');
            $('#deleteTranslationForm').attr('action', '/translations/' + id);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</x-app-layout>
