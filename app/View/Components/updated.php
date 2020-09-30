<?php

namespace App\View\Components;

use Illuminate\View\Component;

class updated extends Component
{
    public $date;
    public $name;
    public $userId;
    public $avatar;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($date, $name = null, $userId = null, $avatar = null){
        $this->date = $date->diffForHumans();
        $this->name = $name;
        $this->userId = $userId;
        $this->avatar = $avatar;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.updated');
    }
}
