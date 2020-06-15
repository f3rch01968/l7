<?php

namespace App\View\Components;

use Illuminate\View\Component;

class saludar extends Component
{
    public $msj;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($msj)
    {
        $this->msj = $msj;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.saludar');
    }
}
