<?php

namespace App\Http\Controllers;
use App\Models\{responseJobInfo,user,response_has_question,Question};
use Illuminate\Http\Request;

class notificationController extends Controller
{
    public function noti()
    {
        $res = null; // Initialize the variable

        if (auth()->user()->type == 'user') {
            $res =  responseJobInfo::where('idUser', auth()->user()->idUser)->select('idJobInfo', 'idUser','notification')->groupBy('idJobInfo', 'idUser','notification')->get();
            return view('notification.noti2',compact('res'));
        } else if (auth()->user()->type == 'poser') {
            $res = responseJobInfo::select('idJobInfo', 'idUser','notification')->groupBy('idJobInfo', 'idUser','notification')->get();
        }
        return view('notification.noti', compact('res'));
    }

    public function getresume($name,$job){
        if (auth()->user()->type == 'user') {
            $usere = responseJobInfo::where('idUser',$name)->where('idJobInfo',$job)->first();
            $ans =responseJobInfo::all();
            return view('notification.view', compact('usere','ans'));
        }
        else if (auth()->user()->type == 'poser') {
            $usere = responseJobInfo::where('idUser',$name)->where('idJobInfo',$job)->first();
            $ans =responseJobInfo::all();
            return view('notification.resume', compact('usere','ans'));}
    }
    public function fix(request $request){
        responseJobInfo::where('idUser', $request->user)->where('idJobInfo', $request->job)->update(['notification'=>$request->noti]);
        return redirect()->route('notification');
    }
    }
