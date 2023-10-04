<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Poser;
use App\Models\tag;
use App\Http\Controllers\db;

class ProfileController extends Controller
{
    /**
     * logout the user's account.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }

// MAin Profile
    public function index(){
        $user = Auth::user()->idUser;
        $old_password=Auth::user()->password;
        $image = user::where('idUser', $user)->select('image')->first();
        $posersData = Poser::where('idUser', auth()->user()->idUser)->first();
        $tag = tag::all();
        return view('profile.profile',compact('posersData','tag') )->with('old_password',$old_password)->with('image',$image->image);
    }


// Edit name and email
    public function update1(REQUEST $request){
        $user = Auth::user()->idUser;
        $user=User::where('idUser',Auth::user()->idUser)->select('*')->first();
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);
        return redirect()->back()->with('success', 'Profile changed successfully');
    }

// Edit office
public function updateoffice(Request $request)
{
    $userId = Auth::user()->idUser;
    $posersData = Poser::where('idUser', $userId)->first();

    if ($posersData) {
        $posersData->update([
            'userOfficeName' => $request->input('office_name'),
            'userOfficeAddress' => $request->input('office_add'),
        ]);
        return redirect()->back()->with('success', 'Office changed successfully');
    } else {
        return redirect()->back()->with('error', 'No record found for the current user.');
    }
}


// Edit password
public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);
    $user = auth()->user()->idUser;
    $old_password = $request->input('current_password');
    $new_password = $request->input('new_password');
    $conf_password = $request->input('new_password_confirmation');

    if (Hash::check($old_password, $user->password)) {
        if ($new_password === $conf_password) {
            $user->update([
                'password' => Hash::make($new_password),
            ]);
            return redirect('/profiles')->with('success', 'Password changed successfully');
        } else {
            return redirect('/profiles')->with('error', 'New password and confirmation password not match');
        }
    } else {
        return redirect('/profiles')->with('error', 'Current password is incorrect');
    }
}

//Image Profile
public function upload(Request $request)
{
    $user = auth()->user()->idUser;
    $userimage = User::where('idUser', $user)->first();
    $image = $request->file('profile_image');

    if ($image) {
        $originalName = $image->getClientOriginalName();
        $image->storeAs('public/profile', $originalName);
        $user->image = $originalName;
        $user->save();

        return redirect()->back()->with('success', 'Image changed successfully');
    } else {
        return redirect()->back()->with('error', 'Image upload failed');
    }
}

}

