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
        if($text == 'category'){
                $tags = Tag::all();
                return view('admincategory', compact('tags'));
        }
        return view('admin'.$text,compact('text'));
    }



    public function storeTag(Request $request)
{
    $validatedData = $request->validate([
        'tag' => 'required|unique:tags|max:255',
    ]);

    Tag::create([
        'tag' => $validatedData['tag'],
    ]);
    $tags = Tag::all();
    return view('admincategory', compact('tags'));
}public function editTagForm($idTag)
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

    $tags = Tag::all();
    return view('admincategory', compact('tags'));
}
public function addTagForm(){
    return view('addminaddTag');
}

public function deleteTag($idTag)
{
    $tag = Tag::findOrFail($idTag);
    $tag->delete();

    $tags = Tag::all();
    return view('admincategory', compact('tags'));
}
}
