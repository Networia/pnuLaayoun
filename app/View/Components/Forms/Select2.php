<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Select2 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $label;
    public $cols;
    public $last;
    public $dataname;
    public $datavalue;
    public $dataobject;
    public $htmlname;

    public function __construct($name, $label = null, $cols = null, $last = null, $dataname = null, $dataobject = null, $datavalue = null, $htmlname = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->cols = $cols;
        $this->last = $last;
        $this->dataname = $dataname;
        $this->datavalue = $datavalue;
        $this->dataobject = $dataobject;
        $this->htmlname = $htmlname;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.select2');
    }
}
