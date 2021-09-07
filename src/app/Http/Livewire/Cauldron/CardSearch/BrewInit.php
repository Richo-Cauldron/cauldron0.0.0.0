<?php

namespace App\Http\Livewire\Cauldron\CardSearch;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Cauldron\CardSearchController;

class BrewInit extends Component
{
    public $searchTerm;
    public $methodResponse;
    public $errorMessage;
    public $responseMessage;
    public $undefined = "Sorry ... Data not available :(";

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
    
    public $totalCardsReturned;
    public $cardSearchResults = [];

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

    public function resendPage()
    {
        // $this->checkForCardSearchValueErrorException();



        return redirect('/card/search?q='.$this->searchTerm);
    }

    public function getQUrlParameter()
    {
        $this->searchTerm = request('q');
        // dump($this->searchTerm);
    }

    // public function getSearchTerm()
    // {
    //     // $this->methodResponse = $this->searchTerm;

    //     $this->checkForCardSearchValueErrorException();

    //     // return redirect()->action([CardSearchController::class, 'index']);

    // }

    // public function checkSearchTermIsEmpty()
    // {
    //     $this->getQUrlParameter();

    //     if ($this->searchTerm === null) {
    //         $this->searchTerm = '';
    //         $this->errorMessage = 'Doh ...!';
    //     }
    //     else {
    //         $this->errorMessage = '';
    //     }
    // }
        public function mount()
        {
            $this->getQUrlParameter();
        }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

    public function checkForCardSearchValueErrorException(): void
{
    $this->cardSearchAPIurl();
    // dump($this->httpAPIRequestUrlget);

    $this->getQUrlParameter();
    // dump($this->searchTerm); //-> true

    if (strlen($this->searchTerm) >= 2 ) {

        try {
            $this->cardSearchResults = $this->httpAPIRequestUrlget->json()['data'];
            // dump($this->cardSearchResults);
        } catch (\Exception $e) {
            $e = 'Unable to match "' . $this->searchTerm . '"';
            $this->responseMessage = $e;
            // $this->totalCardsReturned = '';
        }
    }
    $this->checkSearchInputEmpty();
    $this->totalCardsReturned = Count($this->cardSearchResults);
    // dump($this->cardSearchResults);
}

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

public function cardSearchAPIurl()
    {
    $this->httpAPIRequestUrlget = Http::get('https://api.scryfall.com/cards/search?q=' . $this->searchTerm);
    // dump($this->httpAPIRequestUrlget);
    }

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

public function checkSearchInputEmpty()
    {
        if (strlen($this->searchTerm) < 1 ) {
            $this->responseMessage ='You didn‘t enter anything to search for';
        }
    }

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

public function showInputMessage()
    {
        // if (strlen($this->cardSearchValue) < 2) {
        //     $this->responseMessage = '';
        // }
        
        if ($this->cardSearchResults) {
            $this->responseMessage = 'Total Cards: ' . $this->totalCardsReturned .' containing ' . $this->searchTerm;
            // $this->cardSearchValue ='';
        } 
    }
 
    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

    public function callCardSearchViewParameters()
    {
        $this->cardSearchViewParameters = [
            'searchTerm' => $this->searchTerm,
            'errorMessage' => $this->errorMessage,
            'cardSearchResults' => $this->cardSearchResults,
            'totalCardsReturned' => $this->totalCardsReturned,
            'responseMessage' => $this->responseMessage,
            'undefined' => $this->undefined,
        ];
    }
    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

    public function render()
    {
        // $this->checkSearchTermIsEmpty();
        // $this->getSearchTerm();
        $this->checkForCardSearchValueErrorException();
        $this->showInputMessage();

        return view('livewire.cauldron.card-search.brew-init', [
            
        ]);
    }
}
