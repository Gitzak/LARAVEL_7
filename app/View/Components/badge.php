<?php

namespace App\View\Components;

use Illuminate\View\Component;

class badge extends Component
{
    public $type;
    public $float;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $float = null)
    {
        $this->type = $type;
        $this->float = $float;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.badge');
    }
}
