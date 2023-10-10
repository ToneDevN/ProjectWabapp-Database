<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\JobInfo;
use App\Models\Poser;
use App\Models\Question;
use App\View\Components\main;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $job = JobInfo::all();
        return view('main.index',['job'=>$job]);

    }


    public function detail(Request $request){
        $poser = JobInfo::where('idJobInfo', $request->id)->first();
        $job = JobInfo::where('idUser', '=', $poser->idUser)->first();
        abort_if(!isset($job), 404);

        // Check if the combination of idQuestion and idJobInfo exists
        $applicationExists = DB::table('response_job_infos')
            ->where('idUser', auth()->user()->idUser)
            ->where('idJobInfo', $request->id)
            ->exists();

        return view('main.detail', [
            'job' => $poser,
            'idjob' => $request->id,
            'applicationExists' => $applicationExists, // Pass the result to the view
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
