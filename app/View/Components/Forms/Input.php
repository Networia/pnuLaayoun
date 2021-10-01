<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    public $id;
    public $name;
    public $label;
    public $type;
    public $cols;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id = null,$name = null,$label = null ,$type = null ,$cols = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->cols = $cols;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}
