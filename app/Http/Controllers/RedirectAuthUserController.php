<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectAuthUserController extends Controller
{
    public function home()
    {
        if (auth()->user()->type == 'user') {
            return redirect('/home');
        } else if (auth()->user()->type == 'poser') {
            return redirect('/poser');
        } else if (auth()->user()->type == 'admin') {
            return redirect('/admin');
        } else {
            return redirect()->route('/');
        }
    }
}
