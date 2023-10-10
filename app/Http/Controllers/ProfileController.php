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
use App\Models\user_has_tag;
use App\Http\Controllers\db;

class ProfileController extends Controller
{
    /**
     * logout the user's account.
     */


// ...

public function addTag($tagId)
{
    $userId = Auth::user()->idUser;
    // Check if the user already has the tag (including soft-deleted tags)
    $userTag = user_has_tag::withTrashed()
        ->where('idUser', $userId)
        ->where('idTag', $tagId)
        ->restore();

    // If the tag exists but is soft-deleted, restore it
    if ($userTag != 1) {
        user_has_tag::create([
            'idUser' => $userId,
            'idTag' => $tagId,
        ]);
        
    }

    // Redirect back to the previous page or any other appropriate page
    return redirect()->back()->with('success', 'Tag added successfully');
}


public function removeTag($tagId)
{
    $userId = Auth::user()->idUser;

    // Check if the user has the tag and delete it
    user_has_tag::where('idUser', $userId)->where('idTag', $tagId)->delete();

    // Redirect back to the previous page or any other appropriate page
    return redirect()->back()->with('success', 'Tag removed successfully');
}

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }

// MAin Profile
public function index()
{
    $user = Auth::user()->idUser;
    $old_password = Auth::user()->password;
    $image = User::where('idUser', $user)->select('image')->first();
    $posersData = Poser::where('idUser', auth()->user()->idUser)->first();
    
    // Fetch all tags
    $allTags = Tag::all();

    // Fetch the user's selected tag IDs
    $selectedTagIds = user_has_tag::where('idUser', $user)->pluck('idTag')->toArray();

    return view('profile.profile', compact('posersData', 'allTags', 'selectedTagIds'))
        ->with('old_password', $old_password)
        ->with('image', $image->image);
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

    // Create a new Poser record
    Poser::create([
        'idUser' => $userId,
        'userOfficeName' => $request->input('office_name'),
        'userOfficeAddress' => $request->input('office_add'),
    ]);

    // Update the 'type' attribute for the user model (assuming 'type' is a column in your users table)
    $user = User::find($userId);
    if ($user) {
        $user->type = 1;
        $user->save();
    }

    return redirect()->back()->with('success', 'Office added successfully');
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
    $user = auth()->user();
    $image = $request->file('profile_image');
    $originalName = $image->getClientOriginalName();
    session(['image' => $originalName]);

    $imgFile = $request->file('profile_image')->get();

    $imageFilePath = public_path('/profile/' . $originalName);
    file_put_contents($imageFilePath, $imgFile);

    if ($image) {
        $user->image = $originalName;
        $user->save();

        return redirect()->back()->with('success', 'Image changed successfully');
    } else {
        return redirect()->back()->with('error', 'Image upload failed');
    }
}
// saveTag
public function saveCheckbox(Request $request)
    {
        $checkboxItem = new CheckboxItem();
        $checkboxItem->name = $request->input('category');
        $checkboxItem->save();

        return response()->json(['message' => 'category saved successfully']);
    }

    // deleteTag
    public function deleteCheckbox(Request $request)
    {
        $checkboxItem = CheckboxItem::find($request->input('idTag'));
        if ($checkboxItem) {
            $checkboxItem->delete();
            return response()->json(['message' => 'category deleted successfully']);
        }

        return response()->json(['message' => 'category not found'], 404);
    }
}