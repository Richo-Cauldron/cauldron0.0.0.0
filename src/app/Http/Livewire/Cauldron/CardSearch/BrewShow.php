<?php

namespace App\Http\Livewire\Cauldron\CardSearch;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class BrewShow extends Component
{
// --------------------------------------------------
// Properties.
// --------------------------------------------------
    /** @var string */
    public $cardId;

    /** @var json array */
    public $showCard;

    /** @var string */
    public $undefined = "None ...";

// --------------------------------------------------
// Component non-lifecycle methods.
// --------------------------------------------------

    /**
     * search for individual card via a cardId
     *
     * @return void
     */
    public function showBrewCard(): void
    {
        $this->showCard = Http::get('https://api.scryfall.com/cards/' . $this->cardId)->json();
    }

// --------------------------------------------------
// Component lifecycle methods
// --------------------------------------------------
    
    public function render()
    {
        $this->showBrewCard();        

        return view('livewire.cauldron.card-search.brew-show');
    }
}
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// End of Component.
