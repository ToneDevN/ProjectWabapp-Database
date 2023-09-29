<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    User,Poser,JobInfo,tag
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
        return view('main.index');
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
        if($text == 'category'){
            $tags = Tag::whereNull('deleted_at')->get();

                return view('admincategory', compact('tags'));
        }
        return view('admin'.$text,compact('text'));
    }



    public function storeTag(Request $request)
{
    // Try to find a soft-deleted tag with the same name
    $tag = Tag::withTrashed()->where('tag', $request->input('tag'))->first();

    if ($tag) {
        // Restore the soft-deleted tag
        $tag->restore();
    } else {
        // Create a new tag
        Tag::create([
            'tag' => $request->input('tag'),
        ]);
    }

    // Load all of the tags that have not been deleted
    $tags = Tag::whereNull('deleted_at')->get();

    return view('admincategory', compact('tags'));
}





public function editTagForm($idTag)
{

    $tag = Tag::findOrFail($idTag);
    return view('admineditTag', compact('tag'));
}

public function updateTag(Request $request, $idTag)
{
    $validatedData = $request->validate([
        'tag' => 'required|unique:tags|max:255',
    ]);

    $tag = Tag::findOrFail($idTag);
    $tag->tag = $validatedData['tag'];
    $tag->save();

    $tags = Tag::whereNull('deleted_at')->get();
    return view('admincategory', compact('tags'));
}


public function deleteTag($idTag)
{
    $tag = Tag::findOrFail($idTag);
    $tag->delete();

    $tags = Tag::whereNull('deleted_at')->get();
    return view('admincategory', compact('tags'));
}
}
