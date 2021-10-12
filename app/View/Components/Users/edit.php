<?php

namespace App\View\Components\Users;

use Illuminate\View\Component;

class edit extends Component
{

    public $regions;
    public $cities;
    public $flat;
    public $floor;
    public $building;
    public $street;
    public $addressRegionId;
    public $addressCityId;

    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($regions,$flat="",$floor="",$building="",$street="",$addressRegionId="",$addressCityId="",$cities)
    {
        $this->regions=$regions;
        $this->cities=$cities;
        $this->flat=$flat;
        $this->floor=$floor;
        $this->building=$building;
        $this->street=$street;
        $this->addressRegionId=$addressRegionId;
        $this->addressCityId=$addressCityId;
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
