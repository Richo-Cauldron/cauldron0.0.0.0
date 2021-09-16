<?php

namespace App\Http\Livewire\Tests;

use Livewire\Component;

class ModalTest extends Component
{
    public $show = false;

    protected $listeners = ['show'];

    public function show()
    {
        $this->show = true;
    }
   
}
