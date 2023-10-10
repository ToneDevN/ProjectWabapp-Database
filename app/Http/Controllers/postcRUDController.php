<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\{
    tag,
    Poser,
    Question,
    Question_has_jobInfo,
    jobinfo,
};

class postcRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            return view('jobinfo.index');
        } else {
            return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posersData = Poser::where('idUser', auth()->user()->idUser)->first();

        return view('jobinfo.create', compact('posersData'));
    }
    public function create2(Request $request)
    {
        if ($request->isMethod('post')) {
            // Store the data in the session
            session(['step1_data' => $request->all()]);
        }
        $jobCategories = tag::all();



        return view('jobinfo.create2', compact('jobCategories'));
    }
    public function store(Request $request)
    {
        // Retrieve data from session
        $step1Data = session('step1_data');

        // Check if session data exists
        if ($step1Data) {

            // Create a new jobinfo instance and save data from create1.blade.php
            $jobinfo = new jobinfo();
            $jobinfo->idUser = auth()->user()->idUser;
            $jobinfo->nameJob = $step1Data['nameJob'];
            $jobinfo->workType = $step1Data['workplace_type'];
            $jobinfo->jobType = $step1Data['job_type'];
            $jobinfo->discription = $request->input('job_description');
            $qualification = $request->has('qualification') ? "1" : "0";

            // Update the jobinfo's qualification field
            $jobinfo->Quallification = $qualification;

            $jobinfo->save();
            $idJobInfo = $jobinfo->idJobInfo;

            // Attach tags to the jobinfo if 'category' is an array
            $categoryInput = $request->input('category');
            if (is_array($categoryInput)) {
                $jobinfo->tags()->attach($categoryInput);
            } else {
                $jobinfo->tags()->attach($categoryInput);
            }

            // Create and associate questions using the question_has_job_infos pivot table
            $screeningQuestions = $request->input('screening_question');
            $correctAnswers = $request->input('correct_answer');

            foreach ($screeningQuestions as $key => $question) {
                // Create a new Question record
                $newQuestion = new Question();
                $newQuestion->question = $question;
                $newQuestion->idJobInfo = $idJobInfo;
                // Convert answer from str to int
                $newQuestion->answer = (int)$correctAnswers[$key];
                $newQuestion->save();

                // Get the ID of the newly created question


                // Create a new Question_has_jobInfo record and associate it with the Question and JobInfo

            }

            // Redirect to a success page or any other page you desire
            return redirect()->route('home')->with('success', 'Job created successfully!');
        } else {
            // Handle the case where session data is missing
            return redirect()->back()->with('error', 'Session data missing. Please complete step 1 first.');
        }
    }


    public function editJobinfo(Request $request)
    {
        $idJobInfo = $request->input('idJobinfo');

        $jobinfo = jobinfo::where('idJobInfo', $idJobInfo)->first();
        $jobinfo->idUser = auth()->user()->idUser;
        $jobinfo->nameJob = $request->input('nameJob');
        $jobinfo->workType = $request->input('workplace_type');
        $jobinfo->jobType = $request->input('job_type');
        $jobinfo->discription = $request->input('description');
        $jobinfo->save();



        $screeningQuestions = $request->input('questions');
        $correctAnswers = $request->input('answers');
        $correctId = $request->input('idQuestion');
    
            foreach ($screeningQuestions as $key => $question) {
                // Create a new Question record
                $id = (int)$correctId[$key];

                $newQuestion = Question::where('idQuestion', $id)->first();
                $newQuestion->question = $question;
                $newQuestion->idJobInfo = $idJobInfo;
                // Convert answer from str to int
                $newQuestion->answer = (int)$correctAnswers[$key];
                $newQuestion->save();
                // Get the ID of the newly created question


                // Create a new Question_has_jobInfo record and associate it with the Question and JobInfo

            }
    


        return redirect()->route('user.detail', ['id' => $idJobInfo]);
    }

    public function deleteJobinfo(Request $request){
        jobinfo::destroy($request->input('idJobinfo'));

        return redirect()->route('home');
    }












    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
