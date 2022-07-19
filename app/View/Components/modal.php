<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modal extends Component
{
    public $modalSize;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($modalSize ='modal-md')
    {
        $this->modalSize =$modalSize;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
