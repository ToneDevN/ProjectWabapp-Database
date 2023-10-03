<?php

namespace App\View\Components\main;

use App\Models\user_has_tag;
use Illuminate\View\Component;

class category extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $tag = user_has_tag::where('idUser', auth()->user()->idUser)->get();
        return view('components.main.category', ['tag' => $tag]);
    }
}
