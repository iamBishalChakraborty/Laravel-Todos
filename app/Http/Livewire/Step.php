<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Step extends Component
{
    public $count = [];

    public function increment()
    {
        $this->count[] = count($this->count);
    }

    public function decrement($index)
    {

        unset($this->count[$index]);
    }

    public function render()
    {
        return view('livewire.step');
    }
}
