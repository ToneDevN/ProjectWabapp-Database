<x-app-layout>
    <head>
        <!-- Link to the external CSS stylesheet -->
        <link href="http://127.0.0.1:8000/css/enrollwork.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    </head>
    <div class="distance_top"></div>
    <div class="container">
        <body>
        <form action="{{ route('submit_summary')}}" method="post">
            @csrf
            <h1 class='h1summary'>Check Your Application</h1>
            <h3 style="font-weight: bold">Contract Info</h3>
            <div class="user-info">
                <div class="profile-image-container-summary">
                    <img src="{{ asset('profile/' . $user->idUser . '.jpg') }}" alt="You didn't Set Proflie" class="profile-image">
                </div>
                <p class="user-name">{{ $user->name }}</p>
            </div>
            <!-- Display Gmail and Phone Number -->
            <div class="form-group">
                <span style="display: inline-block; width: 120px;">Gmail:</span>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" readonly>
            </div>

            <div class="form-group">
                <span style="display: inline-block; width: 120px;">Phone Number:</span>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phonenumber }}" readonly>
            </div>

            <!-- Display PDF name -->
            <div class="form-group">
                <label for="resume_name">Resume Name:</label>
                <input style="width:275px" type="text" name="resume_name" id="resume_name" class="form-control" value="{{ $resumeFileName }}" readonly>
            </div>

            <h1 class="h1summary">Screen Question</h1> <!-- Quest section -->
            <!-- Display Questions and Editable Answers -->
            @foreach ($questionsData as $question)
                <div class="question-container-summy">
                    <p class="question">{{ $question->Question }}</p>
                    <div class="radio-option">
                        <label>
                            Answer:
                            <span>
                                <input type="radio" name="question_{{ $question->idQuestion }}" value="1" {{ isset($selectedOptions[$question->idQuestion]) && $selectedOptions[$question->idQuestion] == 1 ? 'checked' : '' }}> Yes
                                <input type="radio" name="question_{{ $question->idQuestion }}" value="2" {{ isset($selectedOptions[$question->idQuestion]) && $selectedOptions[$question->idQuestion] == 2 ? 'checked' : '' }}> No
                            </span>
                        </label>
                    </div>
                    <div class="distance_top"></div>
                </div>
            @endforeach

            <div class="distance"></div>

            <!-- Submit button -->
            <div class="submit-button-wrapper">
                <button type="submit" class="submit-button">Submit</button>
            </div>
        </form>
        </body>
    </div>
</x-app-layout>
