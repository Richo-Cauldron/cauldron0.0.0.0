<?php

namespace App\Http\Livewire\Tests;

use Livewire\Component;
use App\Http\Livewire\Tests\ModalTest;

class ContactModalTest extends ModalTest
{
    public function render()
    {
        return view('livewire.tests.contact-modal-test');
    }
}
