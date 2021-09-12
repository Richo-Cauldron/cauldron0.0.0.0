<?php

namespace App\Http\Livewire\Cauldron\CardSearch;

use Livewire\Component;

class BrewPileList extends Component
{
    public $cardName;

    public $cardBrewPileList = [];

// --------------------------------------------------
// Component event listener
// --------------------------------------------------

    protected $listeners = ['cardForBrewPile'];

// --------------------------------------------------
// Component non-lifecycle methods.
// --------------------------------------------------

    public function cardForBrewPile(array $card)
    {
        $this->cardName = $card['name'];

        $this->addToBrewPileList($this->cardName);
    }
// --------------------------------------------------

    public function addToBrewPileList($cardName)
    {
        $this->cardBrewPileList[] = $cardName;
    }

    public function render()
    {
        return view('livewire.cauldron.card-search.brew-pile-list');
    }
}
