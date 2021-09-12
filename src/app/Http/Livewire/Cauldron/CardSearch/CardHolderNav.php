<?php

namespace App\Http\Livewire\Cauldron\CardSearch;

use Livewire\Component;

class CardHolderNav extends Component
{
    public $card;

    public function mount($card)
    {
        $this->card = $card;

    }
    public function addToBrew()
    {
        $this->emit('cardForBrewPile', $this->card);
        $this->emit('addCardToDatabase', $this->card);
    }
    public function render()
    {
        return view('livewire.cauldron.card-search.card-holder-nav');
    }
}
