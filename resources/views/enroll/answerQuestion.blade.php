<x-app-layout>
    <head>
        <!-- Link to the external CSS stylesheet -->
        <link href="http://127.0.0.1:8000/css/enrollwork.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="distance_top"></div>
        <div class="container">
        <!-- Form for answering the questions -->
        <form action="{{ route('summarize')}}" method="post" class="center-form">
            @csrf
            <h1>Question</h1>
            <!-- Render the questions and answer options -->
            @foreach ($questionsData as $question)
                <div class="question-container">

                    <p class="question">{{ $question->Question }}</p>
                    <!-- Render answer options with radio buttons -->
                    @foreach ([1 => 'Yes', 2 => 'No'] as $value => $displayText)
                        <div class="radio-option">
                            <label>
                                <input type="radio" name="selected_option[{{ $question->idQuestion }}]"
                                    value="{{ $value }}" required>
                                {{ $displayText }}
                            </label>
                        </div>
                    @endforeach
                    <div class="distance_top"></div>
            @endforeach

                
            <!-- Submit button -->
            <div class="submit-button-wrapper">
                <button type="submit" class="submit-button">Next</button>
            </div>
        </form>
    </div>
    <div class="distance_bottom"></div>
    </body>

</x-app-layout>
