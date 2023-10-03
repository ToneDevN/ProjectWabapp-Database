<?php

namespace App\Http\Controllers;
use App\Models\{responseJobInfo,user};
use Illuminate\Http\Request;

class notificationController extends Controller
{
    public function noti()
    {
        if (auth()->user()->type == 'user') {
            return view('notification.noti2');
        } else if (auth()->user()->type == 'poser') {
            $res = responseJobInfo::select('idJobInfo','idUser')->groupBy('idJobInfo','idUser')->get();
            return view('notification.noti',compact('res'));
        }
    }
    public function getresume($name){
        $usere = responseJobInfo::where('idUser',$name)->first();
        return view('notification.resume',compact('usere'));
    }
    }
