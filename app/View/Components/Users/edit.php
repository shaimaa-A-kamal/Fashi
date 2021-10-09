<?php

namespace App\View\Components\Users;

use Illuminate\View\Component;

class edit extends Component
{

    public $regions;
    public $flat;
    public $floor;
    public $building;
    public $street;
    public $addressRegionId;
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($id="new address",$regions,$flat="",$floor="",$building="",$street="",$addressRegionId="")
    {   $this->id=$id;
        $this->regions=$regions;
        $this->flat=$flat;
        $this->floor=$floor;
        $this->building=$building;
        $this->street=$street;
        $this->addressRegionId=$addressRegionId;


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.users.edit');
    }
}
