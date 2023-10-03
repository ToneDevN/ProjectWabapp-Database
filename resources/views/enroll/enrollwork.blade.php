<script>
   document.getElementById('dropzone-file').addEventListener('change', function(event) {
    const fileInput = event.target;
    const maxSize = 10 * 1024 * 1024;

    if (fileInput.files.length > 0) {
        const fileSize = fileInput.files[0].size;

        if (fileSize > maxSize) {
            document.getElementById('file-size-error').textContent = 'File size exceeds 10MB limit.';
            fileInput.value = '';
        } else {
            document.getElementById('file-size-error').textContent = '';
            // Set the selected file name in the span element
            document.getElementById('selected-file-name').textContent = 'Selected File: ' + fileInput.files[0].name;
        }
    }
});

</script>

<x-app-layout>

    <body>
        <div class="distance_top"></div>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
        <link href="http://127.0.0.1:8000/css/enrollwork.css" rel="stylesheet">
        <div class="container">
            <h1>Contract Info</h1>

            <!-- Render user's profile image and name side by side with extra space -->
            <div class="user-info" style="margin-bottom: 20px;">
                <div class="profile-image-container">
                    <img src="{{ asset('profile/' . $user->idUser . '.jpg') }}" alt="You didn't Set Proflie" class="profile-image">
                </div>

                <p class="user-name">{{ $user->name }}</p>
            </div>

            <!-- Profile Form -->
            <form action="{{ route('ansQuestion') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="input-field" value="{{ auth()->user()->email }}" required>

                <label for="phone">Mobile Phone Number:</label>
                <input type="tel" name="phone" id="phone" class="input-field" value="{{ auth()->user()->phonenumber }}" required>

                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PDF (MAX. 10MB)</p>
                            <span id="selected-file-name" class="text-sm text-gray-500 dark:text-gray-400"></span> <!-- Add this line to display selected file name -->
                        </div>
                        <input id="dropzone-file" name="resume" type="file" class="hidden" accept=".pdf" required />
                    </label>
                </div>


                <div class="distance_bottom"></div>

                <input type="hidden" name="resume_file_name" value="{{ session('resumeFileName') }}">
                <button type="submit" class="submit-button">Next</button>
            </form>
        </div>
        <div class="distance_bottom"></div>
    </body>
</x-app-layout>
