<?php

namespace App\Http\Controllers;

use App\Models\{responseJobInfo, user, response_has_question, Question};
use Illuminate\Http\Request;

class notificationController extends Controller
{
    public function noti()
    {
        // $res = null; // Initialize the variable

        if (auth()->user()->type == 'user') {
            $res =  responseJobInfo::where('idUser', auth()->user()->idUser)->select('idJobInfo', 'idUser', 'notification')->groupBy('idJobInfo', 'idUser', 'notification')->get();
            dd($res);
            return view('notification.noti2', compact('res'));
        } else if (auth()->user()->type == 'poser') {
            $res =  responseJobInfo::where('idJobInfo', )->select('idJobInfo', 'idUser', 'notification')->groupBy('idJobInfo', 'idUser', 'notification')->get();
            return view('notification.noti', compact('res'));
    }
        }
        

    public function getresume($name, $job)
    {
        if (auth()->user()->type == 'user') {
            $idResponse = responseJobInfo::where('idUser', $name)->where('idJobInfo', $job)->first();
            // dd($idResponse->idResponse);
            $Question = Question::where('idJobInfo', $job)->get();
            $Response = collect([]);
            $ResponseAns = response_has_question::all();
            foreach ($Question as $Question) {
                $ResponseAns = response_has_question::where('idResponse', $idResponse->idResponse)->where('idQuestion', $Question->idQuestion)->first();
                $Response->push($ResponseAns);
            }


            $usere = responseJobInfo::where('idUser', $name)->where('idJobInfo', $job)->first();
            $ans = responseJobInfo::all();
            return view('notification.view', compact('usere', 'Response'));

        } else if (auth()->user()->type == 'poser') {
            $idResponse = responseJobInfo::where('idUser', $name)->where('idJobInfo', $job)->first();
            // dd($idResponse->idResponse);
            $Question = Question::where('idJobInfo', $job)->get();
            $Response = collect([]);
            $ResponseAns = response_has_question::all();
            foreach ($Question as $Question) {
                $ResponseAns = response_has_question::where('idResponse', $idResponse->idResponse)->where('idQuestion', $Question->idQuestion)->first();
                $Response->push($ResponseAns);
            }
            $usere = responseJobInfo::where('idUser', $name)->where('idJobInfo', $job)->first();
            $ans = responseJobInfo::all();
            return view('notification.resume', compact('usere', 'Response'));
        }
    }
    public function fix(request $request)
    {
        responseJobInfo::where('idUser', $request->user)->where('idJobInfo', $request->job)->update(['notification' => $request->noti]);
        return redirect()->route('notification');
    }
}
