<x-app-layout>
    <body>
        <div class="distance_top"></div>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
        <link href="http://127.0.0.1:8000/css/createjob.css" rel="stylesheet">
        <form action="{{ route('create2') }}" method="post">

            @csrf
            <h1>Let's create your job post</h1>
            <p class="indicate">*Indicates required</p>

            <label for="company"><p class="input_distance">Company:</p></label>
            <input type="text" name="company" id="company" class="input-style" value="{{ $posersData->userOfficeName }}" required disabled>

            <label for="job_location"><p class="input_distance">Job Location:</p></label>
            <input type="text" name="job_location" id="job_location" class="input-style" value="{{ $posersData->userOfficeAddress }}" required disabled>

            <label for="nameJob"><p class="input_distance">Job Title:</p></label>
            <input type="text" name="nameJob" id="namejob" class="input-style" required>



            <label for="workplace_type"><p class="input_distance">Workplace Type:</p></label>
            <select name="workplace_type" id="workplace_type" class="input-style">
                <option value="remote">Remote</option>
                <option value="office">Office</option>
                <option value="hybrid">Hybrid</option>
            </select>

            <label for="job_type"><p class="input_distance">Job Type:</p></label>
            <select name="job_type" id="job_type" class="input-style">
                <option value="full_time">Full-time</option>
                <option value="part_time">Part-time</option>
                <option value="contract">Contract</option>
            </select>

            <div class="submit-button-wrapper">
                <input type="submit" value="Next" class="submit-button">
            </div>
            <div class="distance_bottom"></div>

        </form>
    </body>
</x-app-layout>
