<?php

namespace App\Http\Livewire;
use App\Step;
use Livewire\Component;

class EditStep extends Component
{
    public $count = [];

    public function mount($steps)
    {
        $this->count = $steps->toArray();
    }

    public function increment()
    {

        $this->count[] = count($this->count);
    }

    public function decrement($index)
    {
       $step = $this->count[$index];
       if (isset($step['id'])){
           Step::find($step['id'])->delete();
       }
        unset($this->count[$index]);
    }
    public function render()
    {
        return view('livewire.edit-step');
    }
}
