<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Verses') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Card Container for File Upload -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-8 max-w-3xl mx-auto">
            <!-- Form for file upload -->
            <form action="{{ route('import_verses') }}" method="POST" enctype="multipart/form-data" class="space-y-6" onsubmit="return validateFileInput()">
                @csrf
                <div class="flex items-center space-x-4">
                    <div class="flex-grow">
                        <label for="file" class="sr-only">Upload DOCX File</label>
                        <input type="file" name="file" id="file" accept=".docx" 
                               class="w-full p-3 border border-gray-300 rounded-lg shadow-sm text-gray-700 bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 hover:bg-blue-100 transition-all">
                    </div>
                    <button type="submit" 
                            class="bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-600 hover:to-indigo-600 text-black font-bold py-3 px-6 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out">
                        Import
                    </button>
                </div>
                <!-- Validation Error Message -->
                <p id="file-error-message" class="text-red-500 text-sm mt-2 hidden">Please select a DOCX file to upload.</p>
            </form>
        </div>

        <!-- Display Table if Data Exists -->
        @if(isset($versesData))
            <div class="bg-white shadow-lg rounded-lg p-6 max-w-5xl mx-auto mt-8">
                <!-- Table Header -->
                <div class="mb-6 text-center">
                    <h2 class="text-2xl font-semibold text-gray-800 tracking-wide">Extracted Verses</h2>
                </div>
                <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-200">
                    <table class="min-w-full table-auto bg-white">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Verse</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Tagalog Explanation</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Translation Explanation</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($versesData as $verseRow)
                                <tr class="hover:bg-gray-50 transition-colors duration-300">
                                    <td class="px-4 py-2 text-gray-700 text-sm" >{!! $verseRow['verse'] !!}</td>
                                    <td class="px-4 py-2 text-gray-700 text-sm" style="text-align: justify;">{!! nl2br(e($verseRow['tagalog_explanation'])) !!}</td>
                                    <td class="px-4 py-2 text-gray-700 text-sm" style="text-align: justify;">{!! nl2br(e($verseRow['translation_explanation'])) !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

    <!-- JavaScript for Validation -->
    <script>
        function validateFileInput() {
            const fileInput = document.getElementById('file');
            const errorMessage = document.getElementById('file-error-message');

            if (!fileInput.files.length) {
                errorMessage.classList.remove('hidden');
                return false; // Prevent form submission
            }

            errorMessage.classList.add('hidden');
            return true; // Allow form submission
        }
    </script>

</x-app-layout>
