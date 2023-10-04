<?php

namespace App\Http\Livewire;

use App\Models\JobInfo;
use Livewire\Component;

class Search extends Component
{
    public $search = "";

    public function render()
    {
        $results = [];


        if(strlen($this->search) >= 1){
            $results = JobInfo::where('nameJob','like','%'.$this->search.'%')->limit(10)->get();
        }

        return view('livewire.search',['job'=> $results]);
    }
}
