<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Verses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-md p-6">

                <h2 class="text-2xl font-semibold mb-4">Add New Verse</h2>

                <!-- Verse Form -->
             
                    <!-- Book Field -->
                    <div class="mb-4">
                        <label for="book" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Book</label>
                        <select id="book" name="book" class="form-select mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></select>
                    </div>

             <!-- Chapter Field -->
             <div class="mb-4">
    <label for="chapter" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Chapter</label>
    <select id="chapter" name="chapter" class="form-select mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></select>
</div>


                    <!-- Script with TagalogBookNames array -->
                    <script>
    const TagalogBookNames = ["Select Book",
        "Genesis", "Exodo", "Levitico", "Bilang", "Deuteronomio", "Josue", "Hukom", "Ruth", "I Samuel", "II Samuel",
        "I Hari", "II Hari", "I Cronica", "II Cronica", "Ezra", "Nehemias", "Esther", "Job", "Awit", "Kawikaan", "Eclesiastes", "Awit ng mga Awit",
        "Isaias", "Jeremias", "Panaghoy", "Ezekiel", "Daniel", "Oseas", "Joel", "Amos", "Obadias", "Jonas", "Micas", "Nahum", "Habakuk", "Zefanias",
        "Hagai", "Zacarias", "Malakias", "Mateo", "Marcos", "Lucas", "Juan", "Gawa", "Roma", "I Corinto", "II Corinto", "Galacia", "Efeso", "Filipos",
        "Colosas", "I Tesalonica", "II Tesalonica", "I Timoteo", "II Timoteo", "Tito", "Filemon", "Hebreo", "Santiago", "I Pedro", "II Pedro",
        "I Juan", "II Juan", "III Juan", "Judas", "Apocalipsis"
    ];

    // Get the dropdown elements
    const bookDropdown = document.getElementById('book');
    const chapterDropdown = document.getElementById('chapter');

    // Populate the book dropdown with options
    TagalogBookNames.forEach(book => {
        const option = document.createElement('option');
        option.value = book;
        option.text = book;
        bookDropdown.appendChild(option);
    });

    // Event listener for book selection
    bookDropdown.addEventListener('change', function () {
        
        // Clear previous chapter options
        chapterDropdown.innerHTML = '';

        // Get the selected book
        const selectedBook = bookDropdown.value;

        // Simulate fetching chapters based on the selected book (You may replace this with actual data)
        const chapters = getChaptersForBook(selectedBook);

        // Populate the chapter dropdown with options
        chapters.forEach(chapter => {
            const option = document.createElement('option');
            option.value = chapter;
            option.text = chapter;
            chapterDropdown.appendChild(option);
        });
    });


// Function to simulate fetching chapters based on the selected book
function getChaptersForBook(book) {
    // Replace this with actual logic to fetch chapters from your data source
    // For simplicity, returning an array with a static set of chapters
    switch (book) {
        case 'Genesis':
            return Array.from({ length: 50 }, (_, i) => (i + 1).toString());
        case 'Exodo':
            return Array.from({ length: 40 }, (_, i) => (i + 1).toString());
        case 'Levitico':
            return Array.from({ length: 27 }, (_, i) => (i + 1).toString());
        case 'Bilang':
            return Array.from({ length: 36 }, (_, i) => (i + 1).toString());
        case 'Deuteronomio':
            return Array.from({ length: 34 }, (_, i) => (i + 1).toString());
        case 'Josue':
            return Array.from({ length: 24 }, (_, i) => (i + 1).toString());
        case 'Hukom':
            return Array.from({ length: 21 }, (_, i) => (i + 1).toString());
        case 'Ruth':
            return Array.from({ length: 4 }, (_, i) => (i + 1).toString());
        case 'I Samuel':
            return Array.from({ length: 31 }, (_, i) => (i + 1).toString());
        case 'II Samuel':
            return Array.from({ length: 24 }, (_, i) => (i + 1).toString());
        case 'I Hari':
            return Array.from({ length: 22 }, (_, i) => (i + 1).toString());
        case 'II Hari':
            return Array.from({ length: 25 }, (_, i) => (i + 1).toString());
        case 'I Cronica':
            return Array.from({ length: 29 }, (_, i) => (i + 1).toString());
        case 'II Cronica':
            return Array.from({ length: 36 }, (_, i) => (i + 1).toString());
        case 'Ezra':
            return Array.from({ length: 10 }, (_, i) => (i + 1).toString());
        case 'Nehemias':
            return Array.from({ length: 13 }, (_, i) => (i + 1).toString());
        case 'Esther':
            return Array.from({ length: 10 }, (_, i) => (i + 1).toString());
        case 'Job':
            return Array.from({ length: 42 }, (_, i) => (i + 1).toString());
        case 'Awit':
            return Array.from({ length: 150 }, (_, i) => (i + 1).toString());
        case 'Kawikaan':
            return Array.from({ length: 31 }, (_, i) => (i + 1).toString());
        case 'Eclesiastes':
            return Array.from({ length: 12 }, (_, i) => (i + 1).toString());
        case 'Awit ng mga Awit':
            return Array.from({ length: 8 }, (_, i) => (i + 1).toString());
        case 'Isaias':
            return Array.from({ length: 66 }, (_, i) => (i + 1).toString());
        case 'Jeremias':
            return Array.from({ length: 52 }, (_, i) => (i + 1).toString());
        case 'Panaghoy':
            return Array.from({ length: 5 }, (_, i) => (i + 1).toString());
        case 'Ezekiel':
            return Array.from({ length: 48 }, (_, i) => (i + 1).toString());
        case 'Daniel':
            return Array.from({ length: 12 }, (_, i) => (i + 1).toString());
        case 'Oseas':
            return Array.from({ length: 14 }, (_, i) => (i + 1).toString());
        case 'Joel':
            return Array.from({ length: 3 }, (_, i) => (i + 1).toString());
        case 'Amos':
            return Array.from({ length: 9 }, (_, i) => (i + 1).toString());
        case 'Obadias':
            return Array.from({ length: 1 }, (_, i) => (i + 1).toString());
        case 'Jonas':
            return Array.from({ length: 4 }, (_, i) => (i + 1).toString());
        case 'Micas':
            return Array.from({ length: 7 }, (_, i) => (i + 1).toString());
        case 'Nahum':
            return Array.from({ length: 3 }, (_, i) => (i + 1).toString());
        case 'Habakuk':
            return Array.from({ length: 3 }, (_, i) => (i + 1).toString());
        case 'Zefanias':
            return Array.from({ length: 3 }, (_, i) => (i + 1).toString());
        case 'Hagai':
            return Array.from({ length: 2 }, (_, i) => (i + 1).toString());
        case 'Zacarias':
            return Array.from({ length: 14 }, (_, i) => (i + 1).toString());
        case 'Malakias':
            return Array.from({ length: 4 }, (_, i) => (i + 1).toString());
        case 'Mateo':
            return Array.from({ length: 28 }, (_, i) => (i + 1).toString());
        case 'Marcos':
            return Array.from({ length: 16 }, (_, i) => (i + 1).toString());
        case 'Lucas':
            return Array.from({ length: 24 }, (_, i) => (i + 1).toString());
        case 'Juan':
            return Array.from({ length: 21 }, (_, i) => (i + 1).toString());
        case 'Gawa':
            return Array.from({ length: 28 }, (_, i) => (i + 1).toString());
        case 'Roma':
            return Array.from({ length: 16 }, (_, i) => (i + 1).toString());
        case 'I Corinto':
            return Array.from({ length: 16 }, (_, i) => (i + 1).toString());
        case 'II Corinto':
            return Array.from({ length: 13 }, (_, i) => (i + 1).toString());
        case 'Galacia':
            return Array.from({ length: 6 }, (_, i) => (i + 1).toString());
        case 'Efeso':
            return Array.from({ length: 6 }, (_, i) => (i + 1).toString());
        case 'Filipos':
            return Array.from({ length: 4 }, (_, i) => (i + 1).toString());
        case 'Colosas':
            return Array.from({ length: 4 }, (_, i) => (i + 1).toString());
        case 'I Tesalonica':
            return Array.from({ length: 5 }, (_, i) => (i + 1).toString());
        case 'II Tesalonica':
            return Array.from({ length: 3 }, (_, i) => (i + 1).toString());
        case 'I Timoteo':
            return Array.from({ length: 6 }, (_, i) => (i + 1).toString());
        case 'II Timoteo':
            return Array.from({ length: 4 }, (_, i) => (i + 1).toString());
        case 'Tito':
            return Array.from({ length: 3 }, (_, i) => (i + 1).toString());
        case 'Filemon':
            return Array.from({ length: 1 }, (_, i) => (i + 1).toString());
        case 'Hebreo':
            return Array.from({ length: 13 }, (_, i) => (i + 1).toString());
        case 'Santiago':
            return Array.from({ length: 5 }, (_, i) => (i + 1).toString());
        case 'I Pedro':
            return Array.from({ length: 5 }, (_, i) => (i + 1).toString());
        case 'II Pedro':
            return Array.from({ length: 3 }, (_, i) => (i + 1).toString());
        case 'I Juan':
            return Array.from({ length: 5 }, (_, i) => (i + 1).toString());
        case 'II Juan':
            return Array.from({ length: 1 }, (_, i) => (i + 1).toString());
        case 'III Juan':
            return Array.from({ length: 1 }, (_, i) => (i + 1).toString());
        case 'Judas':
            return Array.from({ length: 1 }, (_, i) => (i + 1).toString());
        case 'Apocalipsis':
            return Array.from({ length: 22 }, (_, i) => (i + 1).toString());
        default:
            return [];
    }
}

</script>


       

   <!-- Verse Number Field -->
<div class="mb-4">
    <label for="verse_number" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Verse Number</label>
    <input type="text" class="form-control" id="verse_number" name="verse_number" required>
    <small id="verseNumberHelp" class="text-muted">Enter verse numbers in formats like: 1, 3-5, 1, 1-2, 1, 3-5, 7-8</small>

    <!-- Display validation status -->
    <div id="verseNumberValidationStatus"></div>
</div>

<!-- Include the updated script for real-time validation -->
<script>
// Function to validate verse number
function validateVerseNumber(verseNumber) {
    // Regular expressions for valid verse number formats
    const validFormats = [
        /^\d+$/,                     // Single verse number
        /^\d+(-\d+)?$/,              // Range of verses
        ///^\d+(,\s*\d+(-\d+)?)+$/     // Comma-separated list of verses
        /^\d+(-\d+)?(,\s*\d+(-\d+)?)*$/  // Comma-separated list of verses
    ];

    // Check if the verse number matches any valid format
    return validFormats.some(regex => regex.test(verseNumber.trim()));
}

    // Event listener for verse number input
    document.getElementById('verse_number').addEventListener('input', function () {
        const verseNumberInput = document.getElementById('verse_number');
        const validationStatus = document.getElementById('verseNumberValidationStatus');

        // Validate verse number
        const isValid = validateVerseNumber(verseNumberInput.value);

        // Display validation status
        validationStatus.textContent = isValid ? 'Valid verse number format' : 'Invalid verse number format';
        validationStatus.style.color = isValid ? 'green' : 'red';
    });
</script>



                                        <!-- Translation Field -->
                                        <div class="mb-4">
                        <label for="translation" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Translation</label>
                        <input type="text" class="form-input mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="translation" name="translation" required>
                    </div>


                    <!-- Content Field -->
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Verse Content</label>
                        <textarea class="form-textarea mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="content" name="content" rows="4" required></textarea>
                    </div>

                                        <!-- Verse Explanation Field -->
                                        <div class="mb-4">
                        <label for="verse_explanation" class="block text-sm font-medium text-gray-600 dark:text-gray-300">Verse Explanation</label>
                        <textarea class="form-textarea mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="verse_explanation" name="verse_explanation" rows="4" required></textarea>
                    </div>

                    <!-- Other Fields (translation, revision, date, locale, district, lesson, events) -->
                    <!-- Adjust the form fields based on your specific attributes -->

                    <!-- Submit Button -->
                    <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">Add Verse</button>
            

            </div>
        </div>
    </div>
</x-app-layout>
