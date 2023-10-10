<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\{
    User,Poser,tag,JobInfo
};

class AdminController extends Controller
{
    public function showUsers()
    {
        $users = User::where('type', 0)->get(); // Retrieve users with type 0
        $posers = User::where('type', 1)->get(); // Retrieve posers with type 1
        $userIds = User::where('type', 0)->pluck('idUser');
        $poserIds = User::where('type', 1)->pluck('idUser');

        return view('adminUser', compact('users', 'posers', 'userIds', 'poserIds'));
    }

    public function searchUser(Request $request)
    {
        $search = $request->input('search');

        $users = User::where('name', 'like', '%' . $search . '%')->where('type',0)->get();
        $posers = User::where('name', 'like', '%' . $search . '%')->where('type',1)->get();

        return view('adminUser', compact('users', 'posers'));
    }

    public function delete($idUser)
    {
        $user = User::find($idUser);
        $poser = User::find($idUser);

        if (!$user || !$poser) {
            //error message
            Log::error("User with ID $idUser not found.");
            return redirect()->route('adminUser')->with('error', 'User not found');
        }

        $user->delete();
        $poser->delete();

        $users = User::where('type', 0)->get();
        $posers = User::where('type', 1)->get();

        return view('adminUser', compact('users', 'posers'));
    }
    public function adminHome() {
        $countuser = User::all()->count();
        $countpost = JobInfo::all()->count();
        $counttag = tag::all()->count();
        return view('adminHome',compact('countuser','countpost','counttag'));
    }
    public function admint($text) {
        $job= JobInfo::all();
        $tags= Tag::all();
        return view('admin'.$text,compact('text','job','tags'));
    }
    public function detail(Request $request){
        $poser = JobInfo::where('idJobInfo',$request->id)->first();
        $job = JobInfo::where('idUser', '=',$poser->idUser)->first();
        abort_if(!isset($job),404);
        if(isset($job)){
            return view('detailpost', ['job'=>$poser,'idjob'=>$request->id]);
        }
    }
    public function deletePost($id){
        JobInfo::where('idJobInfo',$id)->delete();
        return redirect()->route('admin.t',['text'=>'post']) ;
     }

}
