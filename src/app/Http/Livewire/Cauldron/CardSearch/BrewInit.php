<?php

namespace App\Http\Livewire\Cauldron\CardSearch;

use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Cauldron\CardSearchController;

class BrewInit extends Component
{
// --------------------------------------------------
// Properties
// --------------------------------------------------

    /** @var string */
    public $searchTerm;

    /** @var string */
    public $responseMessage;

    /** @var string */
    public $undefined = "Sorry ... Data not available :(";

    /** @var int */
    public $totalCardsReturned;

    /** @var array */
    public $cardSearchResults = [];

    /** @var array */
    public $cardBrewPileList = [];

    /** @var string */
    public $cardName;

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
        // dump($this->cardName);
    }
// --------------------------------------------------

    public function addToBrewPileList($cardName)
    {
        $this->cardBrewPileList[] = $cardName;
    }

    /**
     * Check string length input for 0 -> message
     *
     * @return void
     */
    public function checkSearchInputEmpty(): void
    {
        if (strlen($this->searchTerm) < 1 ) {
            $this->responseMessage ='You didn‘t enter anything to search for';
        }
    }

// --------------------------------------------------

    /**
     * get q parameter from passed url
     *
     * @return void
     */
    public function getQUrlParameter():void
    {
        $this->searchTerm = request('q');
    }

// --------------------------------------------------

    /**
     * keydown method redirect to self + search input
     *
     * @return redirect
     */
    public function resendPage()
    {
        return redirect('/card/search?q='.$this->searchTerm);
    }

// --------------------------------------------------

    /**
     * generate SF API accepted card search 
     *
     * @return void
     */
    public function cardSearchAPIurl(): void
    {
        $this->httpAPIRequestUrlget = Http::get('https://api.scryfall.com/cards/search?q=' . $this->searchTerm);
    }

// --------------------------------------------------
    
    /**
     * search input validation
     *
     * @return void
     */
    public function checkForCardSearchErrors(): void
    {
        $this->cardSearchAPIurl();
        
        $this->getQUrlParameter();
        
        if (strlen($this->searchTerm) >= 2 ) {

            try {
                $this->cardSearchResults = $this->httpAPIRequestUrlget->json()['data'];
               
            } catch (\Exception $e) {
                $e = 'Unable to match "' . $this->searchTerm . '"';
                $this->responseMessage = $e;
            }
        }

        $this->checkSearchInputEmpty();
        
        // $this->totalCardsReturned = Count($this->cardSearchResults);
    }

// --------------------------------------------------
    
    /**
     * get total cards amount returned from request
     *
     * @return void
     */
    public function getCardTotalReturned()
    {
        $this->totalCardsReturned = Count($this->cardSearchResults);
    }
// --------------------------------------------------

    /**
     * Successful card search response message
     *
     * @return void
     */
    public function showSuccessMessage(): void
    {
        if ($this->cardSearchResults) {
            $this->responseMessage = 'Total Cards: ' . $this->totalCardsReturned .' containing ' . $this->searchTerm;
        } 
    }

// --------------------------------------------------

    /**
     * Successful card search response message
     *
     * @return void
     */
    public function renderMethodGroup(): void
    {
        $this->checkForCardSearchErrors();
        $this->getCardTotalReturned();
        $this->showSuccessMessage();
    }
 
// --------------------------------------------------
// Component lifecycle methods
// --------------------------------------------------
    
    public function mount()
    {
        $this->getQUrlParameter();
    }
    
// --------------------------------------------------

    public function render()
    {
        $this->renderMethodGroup();

        return view('livewire.cauldron.card-search.brew-init', [
            
        ]);
    }
}

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// End of Component.

