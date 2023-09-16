<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\{tag,
                Poser,
                Question,
                Question_has_jobInfo,
                jobinfo,};

class postcRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            return view('jobinfo.index');
        }else{
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
        $posersData = Poser::first(); // Assuming you want the first record, adjust as needed.
        return view('jobinfo.create', compact('posersData'));
    }
    public function create2(Request $request)
{
    // Validate and store data from the first form
    $jobInfoData = $request->validate([
        'job_title' => 'required',
        'company' => 'required',
        'workplace_type' => 'required',
        'job_location' => 'required',
        'job_type' => 'required',
    ]);

    $jobInfo = Jobinfo::create($jobInfoData);
    // Validate and store data from the second form
    $screeningQuestions = $request->input('screening_question');
    $correctAnswers = $request->input('correct_answer');

    foreach ($screeningQuestions as $key => $question) {
        $newQuestion = [
            'question' => $question,
            'correct_answer' => $correctAnswers[$key],
            'jobinfo_id' => $jobInfo->id,
        ];

        // Insert each question into the database
        Question::create($newQuestion);
    }

    // Insert job category data here using the relationship between Jobinfo and Tag.

    return redirect()->route('dashboard')->with('success', 'Job created successfully!');
}



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

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
