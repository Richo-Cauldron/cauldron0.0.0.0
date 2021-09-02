<?php

namespace App\Http\Livewire\CardSearch;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
// use Livewire\WithPagination;

class CardSearchGeneral extends Component
{   
    // use WithPagination;

    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

    public $cardSearchValue;

    public $cardSearchResults = [];

    public $cardSearchErrorComment;

    public $totalCardsReturned;

    public $responseMessage;

    public $undefined = 'Sorry ... Data not available.';

    public $pageSize = 20;

    // protected $paginationData;

    public $resultCollection;

    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

    public function hydrate()
    {
        $this->cardSearchResults = [];
        
        $this->checkSearchInputEmpty();
        
    }

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

    public function cardSearchPagination()
    {
        // $total=count($this->cardSearchResults);
        // $per_page = 20;
        // $current_page = 1;

        // $starting_point = ($current_page * $per_page) - $per_page;

        // $array = array_slice($this->cardSearchResults, $starting_point, $per_page, true);

        // $this->paginationData= new LengthAwarePaginator($array, $total, $per_page, $current_page, [
        //     'path' => $request->url(),
        //     'query' => $request->query(),
        // ]);

        // dump($this->paginationData);
    }

    // +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

    // public function paginate($items, $perPage = 20, $page = null, $options = [])
    // {
    //     $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    //     $items = $items instanceof Collection ? $items : Collection::make($items);
    //     return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    // }

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
            // 'paginationData' => $this->paginationData,
            
        ]);
    }
            
}
