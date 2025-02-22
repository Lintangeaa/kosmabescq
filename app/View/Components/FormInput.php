<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInput extends Component
{
    public $type;
    public $name;
    public $id;
    public $value;
    public $required;
    public $multiple;
    public $options;

    public function __construct(
        $type = 'text',
        $name,
        $id = null,
        $value = '',
        $required = false,
        $multiple = false,
        $options = []
    ) {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = $value;
        $this->required = $required;
        $this->multiple = $multiple;
        $this->options = $options;
    }

    public function render()
    {
        return view('components.form-input');
    }
}
