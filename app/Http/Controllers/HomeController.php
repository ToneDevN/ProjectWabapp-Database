<?php

namespace App\Http\Controllers;

use App\Models\JobInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('main.index');
    }

    public function detail(){
        $job = JobInfo::where('idJobInfo','=',2)->get();
        $job=$job[0];
        $name = $job->nameJob;
        $workType = $job->workType;
        $jobType = $job->jobType;
        $description = $job->description;




        return view('main.detail', ['name'=>$name, 'workType'=>$workType, 'jobType'=>$jobType, 'description'=>$description]);
    
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function poserHome()
    {
        return view('poserHome');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome() {
        return view('adminHome');
    }
}
