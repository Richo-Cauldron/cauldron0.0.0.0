<?php

namespace App\Http\Livewire\Cauldron\CardSearch;

use Livewire\Component;

class CardComponent extends Component
{
    public $item = [];
    // public $cardList = [];

    public function addToBrew()
    {
        $this->emit('cardForBrewPile', $this->item);

        // dump($this->cardList);
    }

    public function mount(array $item)
    {
        $this->item = $item;

        // dump($this->item);
    }
    public function render()
    {
        return view('livewire.cauldron.card-search.card-component');
    }
}
