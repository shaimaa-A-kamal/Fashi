<?php

namespace App\View\Components\users;

use Illuminate\View\Component;

class addnewaddress extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    // public $cities;
    public $regions;
    public function __construct($regions)
    {
        $this->regions=$regions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.users.addnewaddress');
    }
}
