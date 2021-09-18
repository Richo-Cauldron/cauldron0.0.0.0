<?php

namespace App\Http\Livewire\Cauldron\Modals;

use Livewire\Component;

class BaseModal extends Component
{
    public $show = false;

    protected $listeners = ['show'];

    public function show()
    {
        $this->show = true;
    }
   
}
