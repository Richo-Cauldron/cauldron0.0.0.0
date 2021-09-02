<?php

namespace App\Http\Livewire\CardSearch;

use Livewire\Component;
use Illuminate\Support\Facades\Http;


class CardSearchShow extends Component
{
    public $cardId;

    public $showCard;
    
    public function render()
    {
        $this->showCard = Http::get('https://api.scryfall.com/cards/' . $this->cardId)->json();

        return view('livewire.card-search.card-search-show', [
            'showcard' => $this->showCard,
        ]);
    }
}
