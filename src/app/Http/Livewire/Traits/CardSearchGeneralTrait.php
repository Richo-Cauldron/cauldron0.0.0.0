<?php

namespace App\Http\Livewire\Traits;

use Illuminate\Support\Facades\Http;

trait CardSearchGeneralTrait
{
    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

    public $cardSearchValue;

    public $cardSearchResults = [];

    public $cardSearchErrorComment;

    public $totalCardsReturned;

    public $responseMessage;

    public $undefined = 'Sorry ... Data not available.';


    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

     

    public function checkForCardSearchValueErrorException(): void
    {
        if (strlen($this->cardSearchValue) >= 2 ) {

            try {
                $this->cardSearchResults = $this->httpAPIRequestUrlget->json()['data'];
            } catch (\Exception $e) {
                $e = 'Unable to match "' . $this->cardSearchValue . '"';
                $this->cardSearchErrorComment = $e;
                // $this->totalCardsReturned = '';
            }
        }
        $this->totalCardsReturned = Count($this->cardSearchResults);
        // dump($this->cardSearchResults);
    }
 
    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
 
    public function showInputMessage()
    {
        // if (strlen($this->cardSearchValue) < 2) {
        //     $this->responseMessage = '';
        // }
        
        if ($this->cardSearchResults) {
            $this->responseMessage = 'Total Cards: ' . $this->totalCardsReturned .' containing ' . $this->cardSearchValue;
            // $this->cardSearchValue ='';
        } elseif ($this->cardSearchErrorComment) {
            // $this->responseMessage = '';
            $this->responseMessage = $this->cardSearchErrorComment; 
            // $this->cardSearchValue =''; 
            $this->hydrate();
        }
    }
 
    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
 
    public function cardSearchAPIurl()
    {
    $this->httpAPIRequestUrlget = Http::get('https://api.scryfall.com/cards/search?q=' . $this->cardSearchValue);
    }
 
    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
 
    public function checkSearchInputEmpty()
    {
        if (strlen($this->cardSearchValue) < 1 ) {
            $this->responseMessage ='You didn‘t enter anything to search for';
        }
    }

    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

}