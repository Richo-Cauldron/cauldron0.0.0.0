<?php

namespace App\Http\Livewire\CardSearch;


use Livewire\Component;
use App\Http\Livewire\Traits\CardSearchGeneralTrait;
use Illuminate\Support\Facades\Http;


class CardSearchGeneral extends Component
{   
    /**
     * CSG trait- supply card search & form methods
     */
    use CardSearchGeneralTrait;

    public $cardSearchViewParameters;

    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
    /**
     *  Fires before any action except render().
     *  Executes on every request to server. 
     *
     * @return void
     */
    public function hydrate(): void
    {
        $this->cardSearchResults = [];
        
        $this->checkSearchInputEmpty();
        
    }

    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
    /**
     * Grouping methods from CardSearchGeneralTrait
     *
     * @return void
     */
    public function callCardSearchGeneralMethods(): void
    {
        $this->cardSearchAPIurl(); 

        $this->checkForCardSearchValueErrorException();

        $this->showInputMessage();

        $this->callCardSearchViewParameters();
    }
    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
    /**
     * Called after component instantiated and once only 
     * in lifecycle. Called before render()
     *
     * @return void
     */
    public function mount()
    {
        // 
    }
    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=


    public function callCardSearchViewParameters()
    {
        $this->cardSearchViewParameters = [
            'cardSearchResults' => $this->cardSearchResults,
            'responseMessage' => $this->responseMessage,
            'totalCardsReturned' => $this->totalCardsReturned,
            'undefined' => $this->undefined,   
        ];
    }
    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
    /** 
     * Renders the LW view
     *
     * @return void
     */
    public function render()
    {
        $this->callCardSearchGeneralMethods();

        $this->emit('cardSearchComplete', $this->cardSearchResults);

        return view('livewire.card-search.card-search-general', $this->cardSearchViewParameters);
    }

    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
            
}
