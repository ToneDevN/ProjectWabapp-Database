<x-app-layout>
    <script>
        function addQuestion() {
            const screeningQuestionsContainer = document.querySelector(".screening-questions");

            const newQuestionContainer = document.createElement("div");
            newQuestionContainer.className = "question-container";

            const newQuestionInput = document.createElement("input");
            newQuestionInput.type = "text";
            newQuestionInput.name = "screening_question[]";
            newQuestionInput.className = "input-style";
            newQuestionInput.required = true;

            const newAnswerSelect = document.createElement("select");
            newAnswerSelect.name = "correct_answer[]";
            newAnswerSelect.className = "input-style";
            newAnswerSelect.innerHTML = `
    <option value="1">Yes</option>
    <option value="0">No</option>`;

            const newQuestionAnswerContainer = document.createElement("div");
            newQuestionAnswerContainer.className = "question-answer-container";
            newQuestionAnswerContainer.appendChild(newQuestionInput);
            newQuestionAnswerContainer.appendChild(newAnswerSelect);

            newQuestionContainer.appendChild(newQuestionAnswerContainer);
            screeningQuestionsContainer.appendChild(newQuestionContainer);
        }
    </script>


    <body>
        <div class="distance_top"></div>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
        <link href="http://127.0.0.1:8000/css/createjob.css" rel="stylesheet">
        <form action="{{ route('store') }}" method="post">
            @csrf

            <h1>Let's create your job post</h1>
            <p class="indicate">*Indicates required</p>
            <label for="job_description">
                <p class="input_distance">Job Description*</p>
            </label>
            <textarea name="job_description" id="job_description" class="input-style" rows="4" required></textarea>

            <label for="job_category">
                <p class="input_distance">Job Category*
                <p>
            </label>

            <!-- resources/views/create2.blade.php -->
            <div class="checkbox-container">
                @foreach ($jobCategories as $category)
                <div class="checkbox-item">
                    <input type="checkbox" id="checkbox{{ $category->idTag }}" class="styled-checkbox"
                        name="category[]" value="{{ $category->idTag }}">
                    <label for="checkbox{{ $category->idTag }}" class="styled-label">
                        <span class="checkbox-text">{{ $category->tag }}</span>
                    </label>
                </div>
                @endforeach
            </div>
            <div class="screening-questions">
                <div class="question-container">
                    <label for="screening_question[]">
                        <p class="question_input">Screening Question*</p><br>
                        <p class="quesiton_set">Question</p>
                    </label>
                    <input type="text" name="screening_question[]" class="input-style" required>
                    <div class="input_distance"></div>
                    <select name="correct_answer[]" class="input-style">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
            <button type="button" id="add-question" onclick="addQuestion()">Add Question</button>
            <p class="input_distance">Quallification Setting</p>
            <label for="qualification">
                <input type="checkbox" name="qualification" id="qualification">
                <p id="qualification">Filter out and send rejections to applicants who don’t meet all must-have qualifications</p>
            </label>
            <div class="submit-button-wrapper">
                <input type="submit" value="Post" class="submit-button">
            </div>
            <div class="distance_bottom"></div>
        </form>
    </body>
</x-app-layout>
