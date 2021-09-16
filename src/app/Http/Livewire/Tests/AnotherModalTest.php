<?php

namespace App\Http\Livewire\Tests;

use Livewire\Component;
use App\Http\Livewire\Tests\ModalTest;


class AnotherModalTest extends ModalTest
{    
    public function render()
    {
        return view('livewire.tests.another-modal-test');
    }
}
