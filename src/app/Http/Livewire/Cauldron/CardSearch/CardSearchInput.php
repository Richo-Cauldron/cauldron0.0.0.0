<?php

namespace App\Http\Livewire\Cauldron\CardSearch;

use Livewire\Component;

class CardSearchInput extends Component
{
    public $keydownMethod;

    public $searchTerm; 

    public function packageSearchTerm()
    {
        $this->emit('getAndSendSearchTerm', $this->searchTerm);
    }

    public function boot()
    {
        
    }

    public function render()
    {
        return view('livewire.cauldron.card-search.card-search-input');
    }
}
