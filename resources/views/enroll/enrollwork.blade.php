<script>
    document.getElementById('resume').addEventListener('change', function(event) {
        const fileInput = event.target;
        const maxSize = 10 * 1024 * 1024;

        if (fileInput.files.length > 0) {
            const fileSize = fileInput.files[0].size;

            if (fileSize > maxSize) {
                document.getElementById('file-size-error').textContent = 'File size exceeds 10MB limit.';
                fileInput.value = '';
            } else {
                document.getElementById('file-size-error').textContent = '';
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
                <label for="job_id">Select a Job: Dont forgot to Delete it when Main Page is complete !!!!!!!!!!I make it for check jobId Is practical??</label>
<select name="job_id" id="job_id" class="input-field" required>
    <option value="">Select a idJob</option>
    @foreach ($jobInfoList as $jobId)
        <option value="{{ $jobId }}">{{ $jobId }}</option>
    @endforeach
</select> <!-- make sure this form will work if I selected idjobinfo?
     You can delete it when you make main succesful SUCCESSFULLYYYYY-->
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="input-field" value="{{ auth()->user()->email }}" required>

                <label for="phone">Mobile Phone Number:</label>
                <input type="tel" name="phone" id="phone" class="input-field" value="{{ auth()->user()->phonenumber }}" required>

                <label for="resume">Upload Resume (PDF, max 10MB):</label>
<input type="file" name="resume" id="resume" accept=".pdf" class="form-file-input" style="background-color: white; color: #4869D9; width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px; cursor: pointer; margin-bottom: 10px;" required>


                <input type="hidden" name="resume_file_name" value="{{ session('resumeFileName') }}">
                <button type="submit" class="submit-button">Next</button>
            </form>
        </div>
        <div class="distance_bottom"></div>
    </body>
</x-app-layout>
