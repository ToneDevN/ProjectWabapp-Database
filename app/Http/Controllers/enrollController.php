<?php

namespace App\Http\Controllers;

use App\Models\{JobInfo,
    Question,
    Question_has_jobInfo,
    responseJobInfo,
    User,
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class enrollController extends Controller
{
    public function enroll(){
        $user = auth()->user();
        $jobInfoList = JobInfo::pluck('idjobinfo', 'idjobinfo');
        return view('enroll.enrollwork',compact('user','jobInfoList'));
    }

    public function ansQuestion(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'resume' => 'required|mimes:pdf|max:10000', // Max 10MB and PDF file
        ]);

        // Retrieve the authenticated user's ID
        $userId = auth()->id();

        // Get the original filename
        $originalFileName = $request->file('resume')->getClientOriginalName();

        // Make a unique filename to detect who and what work is being submitted
        $filename = $userId . '_' . $request->input('job_id') . '_' . $originalFileName;

        // Store the email and phone in the session
        session(['email' => $request->input('email')]);
        session(['phone' => $request->input('phone')]);

        // Store the filename in the session
        session(['resumeFileName' => $filename]);

        // Store the file content in the session
        session(['resumeFile' => $request->file('resume')->get()]);

        // Retrieve the job ID from the request
        $jobId = $request->input('job_id');
        session(['jobId' => $jobId]);

        // Fetch question IDs related to the specified job
        $questionIds = Question_has_jobinfo::where('idJobinfo', $jobId)->pluck('idQuestion');

        // Fetch the actual question data using these IDs
        $questionsData = Question::whereIn('idQuestion', $questionIds)->get();

        // Redirect the user to the 'answerQuestion' view with the 'jobQuestions' data
        return view('enroll.answerQuestion', compact('questionsData', 'jobId'));
    }

    public function sumarizeData(Request $request)
    {
        // Fetch the user data
        $user = User::where('idUser', auth()->user()->idUser)->first();

        // Retrieve the resume filename from the session
        $resumeFileName = session('resumeFileName');

        // Retrieve the file content from the session
        $resumeFile = session('resumeFile');

        // Retrieve the job ID from the session
        $jobId = session('jobId');

        // Fetch question IDs related to the specified job
        $questionIds = Question_has_jobinfo::where('idJobinfo', $jobId)->pluck('idQuestion');

        // Fetch the actual question data using these IDs
        $questionsData = Question::whereIn('idQuestion', $questionIds)->get();

        $selectedOptions = $request->input('selected_option');
        session(['selected_options' => $selectedOptions]);

        // Pass the data to the view, including the resume file name and selected answers
        return view('enroll.sumarizeData', [
            'user' => $user,
            'resumeFileName' => $resumeFileName,
            'questionsData' => $questionsData,
            'selectedOptions' => $selectedOptions, // Pass selected options to the view
            'jobId' => $jobId,
        ]);
    }

    public function submitResponse(Request $request)
    {
        // Get the user's ID for insert
        $userId = auth()->user()->idUser;

        // Create an array to store the question IDs and answers
        $responses = [];

        $selectedOptions = session('selected_options');

        // Check if 'selected_option' exists in the request and is an array
        if (isset($selectedOptions) && is_array($selectedOptions)) {
            foreach ($selectedOptions as $questionId => $answer) {
                $response = new responseJobInfo();
                $response->idUser = $userId;
                $response->idQuestion = $questionId;
                $response->idJobInfo = $request->session()->get('jobId');
                $response->answer = $answer;

               // Get the filename and file content from the session
            $resumeFileName = session('resumeFileName');
            $resumeFile = session('resumeFile');

            // Store the file in the public/resume directory using public_path()
            $resumeFilePath = public_path('resume/' . $resumeFileName);
            file_put_contents($resumeFilePath, $resumeFile);

                $response->resume = 'public/resume/' . $resumeFileName;
                $response->save();

                // Store the question ID and answer in the responses array
                $responses[] = [
                    'idResponse' => $response->id, // Assuming 'id' is the primary key of response_job_infos
                    'idQuestion' => $questionId,
                    'answer' => $answer,
                ];
            }
        } else {
            // Worst case if data isn't available
            $user = auth()->user();
            $jobInfoList = JobInfo::pluck('idjobinfo', 'idjobinfo');
            return view('enroll.enrollwork', compact('user', 'jobInfoList'));
        }

        // Insert data into the 'response_has_questions' table
        DB::table('response_has_questions')->insert($responses);

        // Redirect the user or return a response as needed
        return redirect()->route('home')->with('success', 'Responses submitted successfully!');
    }
}
