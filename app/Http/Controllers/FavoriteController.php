<?php

namespace App\Http\Controllers;

use App\Models\favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function save(Request $request){
        $favorite  = new favorite;
        $favorite->idUser = auth()->user()->idUser;
        $favorite->idJobInfo = $request->input('saveFavorite');
        $favorite->save();

        return redirect()->route('user.detail',$request->input('saveFavorite'));
    }
}
