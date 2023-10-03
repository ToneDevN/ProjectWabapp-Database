<?php

namespace App\View\Components\main;

use App\Models\Poser;
use Illuminate\View\Component;

class validation extends Component
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
        $poser = Poser::where('idUser', auth()->user()->idUser)->first();
        $valification = auth()->user()->email_verified_at;
        $userOfficeName = auth()->user()->userOfficeName;
        $userOfficeAddress = auth()->user()->userOfficeAddress;
        if (auth()->user()->type == 'user') {

            return view('components.main.validation', [
                'varification' => $valification,
                'officeName' => $userOfficeName,
                'officeAddress' => $userOfficeAddress,
            ]);
        } else if (auth()->user()->type == 'poser') {
            return view('components.main.validation', [
                'varification' => $valification,
                'officeName' => $userOfficeName,
                'officeAddress' => $userOfficeAddress,
            ]);
        }
    }
}
