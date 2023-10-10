<?php

namespace App\Http\Controllers;

use App\Models\{
    JobInfo,
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
    public $idjob;
    public function enroll(Request $request)
    {
        $user = auth()->user();
        $this->idjob = $request->input('job_id');

        session(['idJobInfo' => $this->idjob]);

        return view('enroll.enrollwork', ['user' => $user, 'idJobInfo' => $this->idjob]);
    }

    public function editenroll(Request $request)
    {
        $user = auth()->user();
        $idjob =  $request->request->get('job_id');
        session(['idjob' => $idjob]);
        $this->idjob = $request->input('editApplication');

        session(['idJobInfo' => $this->idjob]);

        return view('enroll.editenrollwork', ['user' => $user, 'idJobInfo' => $this->idjob]);
    }
    public function updateenroll(Request $request)
    {
        // Store the filename in the session
        $user = auth()->user()->idUser;
        $email = $request->request->get('email');
        $phone = $request->request->get('phone');
        $resume = $request->file('resume')->get();
        $idjob = session('idjob');
        $user1 = User::find(auth()->user()->idUser);

        if ($user1) {
            $user1->phonenumber = $phone;
            $user1->email = $email;
            $user1->save();
        }

        // Initialize the resumeFileName and resumeFile variables
        $resumeFileName = null;
        $resumeFile = null;

        $response = ResponseJobInfo::where('idJobInfo', $idjob)
            ->where('idUser', auth()->user()->idUser)
            ->first();

        if ($response) {
            if (isset($resume)) {
                $request->file('resume')->get();
                $originalFileName = $request->file('resume')->getClientOriginalName();

                $idjob = session('idjob');
                // Make a unique filename to detect who and what work is being submitted
                $resumeFileName = auth()->user()->idUser . '_' . $idjob . '_' . $originalFileName;
                session(['resumeFileName' => $resumeFileName]);

                // Store the file content in the session
                session(['resumeFile' => $request->file('resume')->get()]);
                session(['resumeFileName' => $resumeFileName]);

                $resumeFile = session('resumeFile');

                // Store the file in the public/resume directory using public_path()
                $resumeFilePath = public_path('/resume/' . $resumeFileName);
                file_put_contents($resumeFilePath, $resumeFile);
            }

            if (isset($resumeFileName)) {
                $response->resume = '/resume/' . $resumeFileName;

            }$response->save();
            
        }

        $poser = JobInfo::where('idJobInfo', auth()->user()->idUser)->first();
        $job = JobInfo::where('idUser', '=', $idjob)->first();
        // abort_if(!isset($job), 404);

        // Check if the combination of idQuestion and idJobInfo exists
        $applicationExists = DB::table('response_job_infos')
            ->where('idUser', auth()->user()->idUser)
            ->where('idJobInfo', $idjob)
            ->exists();

        return view('main.detail', [
            'job' => $poser,
            'idjob' => $idjob,
            'applicationExists' => $applicationExists, // Pass the result to the view
        ]);
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

        $idjob = session('idJobInfo');

        // Get the original filename
        $originalFileName = $request->file('resume')->getClientOriginalName();

        // Make a unique filename to detect who and what work is being submitted
        $filename = $userId . '_' . $idjob . '_' . $originalFileName;

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
        $questionIds = Question_has_jobinfo::where('idJobinfo', $idjob)->pluck('idQuestion');

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
        $idjob = session('idJobInfo');
        // Fetch question IDs related to the specified job
        $questionIds = Question_has_jobinfo::where('idJobinfo', $idjob)->pluck('idQuestion');

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
            'jobId' => $idjob,
        ]);
    }

    public function submitResponse(Request $request)
    {
        // Get the user's ID for insert
        $userId = auth()->user()->idUser;

        // Create an array to store the question IDs and answers
        $responses = [];

        $selectedOptions = session('selected_options');
        $idjob = session('idJobInfo');

        // Check if 'selected_option' exists in the request and is an array
        if (isset($selectedOptions) && is_array($selectedOptions)) {
            foreach ($selectedOptions as $questionId => $answer) {
                $response = new responseJobInfo();
                $response->idUser = $userId;
                $response->idQuestion = $questionId;
                $response->idJobInfo = $idjob;
                $response->answer = $answer;

                // Get the filename and file content from the session
                $resumeFileName = session('resumeFileName');
                $resumeFile = session('resumeFile');

                // Store the file in the public/resume directory using public_path()
                $resumeFilePath = public_path('/resume/' . $resumeFileName);
                file_put_contents($resumeFilePath, $resumeFile);

                $response->resume = '/resume/' . $resumeFileName;
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
