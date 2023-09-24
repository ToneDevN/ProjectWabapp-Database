<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    User,Poser,JobInfo
};

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
        return view('home');
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
        $countuser = User::all()->count();
        $countpost = poser::all()->count();
        $countinfo = JobInfo::all()->count();
        return view('adminHome',compact('countuser','countpost','countinfo'));
    }
    public function admint($text) {
        return view('admin'.$text,compact('text'));
    }
}
