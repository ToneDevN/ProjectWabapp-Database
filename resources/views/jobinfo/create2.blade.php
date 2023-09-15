<x-app-layout>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const addQuestionButton = document.getElementById("add-question");
            const screeningQuestionsContainer = document.querySelector(".screening-questions");

            addQuestionButton.addEventListener("click", function() {
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
                    <option value="yes">Yes</option>
                    <option value="no">No</option>`;
                newQuestionContainer.appendChild(newQuestionInput);
                newQuestionContainer.appendChild(newAnswerSelect);
                screeningQuestionsContainer.appendChild(newQuestionContainer);
            });
        });
    </script>


    <body>
        <div class="distance_top"></div>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
        <link href="http://127.0.0.1:8000/css/createjob.css" rel="stylesheet">
        <form action="/submit" method="post">
            <h1>Let's create your job post</h1>
            <p class="indicate">*Indicates required</p>
            @csrf
            <label for="job_description">
                <p class="input_distance">Job Description:</p>
            </label>
            <textarea name="job_description" id="job_description" class="input-style" rows="4" required></textarea>

            <label for="job_category">
                <p class="input_distance">Job Category:</p>
            </label>
            <select name="job_category" id="job_category" class="input-style">
                @foreach ($jobCategories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <div class="screening-questions">
                <div class="question-container">
                    <label for="screening_question[]">
                        <p class="input_distance">Screening Question:</p>
                    </label>
                    <input type="text" name="screening_question[]" class="input-style" required>
                    <select name="correct_answer[]" class="input-style">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>

            <button type="button" id="add-question">Add Question</button>
            <div class="submit-button-wrapper">
                <input type="submit" value="Post" class="submit-button">
            </div>
            <div class="distance_bottom"></div>
        </form>
    </body>
</x-app-layout>
