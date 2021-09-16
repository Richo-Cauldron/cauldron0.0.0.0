<?php

namespace App\Http\Livewire\Tests;

use Livewire\Component;

class CardsTest extends Component
{
    public $cards = ['Conflux', 'Blistercoil', 'Bolas'];
    
    public function render()
    {
        return view('livewire.tests.cards');
    }
}
