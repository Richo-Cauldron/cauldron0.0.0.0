<?php

namespace App\Http\Livewire\Tests;

use Livewire\Component;

class CardList extends Component
{
    public $card;

    public function mount($card)
    {
        $this->card = $card;
    }
    
    public function render()
    {
        return view('livewire.tests.card-list');
    }
}
