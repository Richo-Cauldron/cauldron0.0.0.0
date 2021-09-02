<?php

namespace App\Http\Livewire\CardSearch;


use Livewire\Component;
use App\Http\Livewire\Traits\CardSearchGeneralTrait;
use Illuminate\Support\Facades\Http;


class CardSearchGeneral extends Component
{   

    use CardSearchGeneralTrait;

    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

    public function hydrate()
    {
        $this->cardSearchResults = [];
        
        $this->checkSearchInputEmpty();
        
    }

    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

    public function render()
    {
        $this->cardSearchAPIurl(); 

        $this->checkForCardSearchValueErrorException();

        $this->showInputMessage();

        // $this->cardSearchPagination();

         return view('livewire.card-search.card-search-general', [
            'cardSearchResults' => $this->cardSearchResults,
            'responseMessage' => $this->responseMessage,
            'totalCardsReturned' => $this->totalCardsReturned,
            'undefined' => $this->undefined,   
        ]);
    }

    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
            
}
