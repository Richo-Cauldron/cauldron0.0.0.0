<?php

namespace App\Http\Livewire\Tests;

use App\Http\Livewire\Traits\CardSearchGeneralTrait;

use Livewire\Component;
use stdClass;

class PaginationTest extends Component
{
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

    use CardSearchGeneralTrait;

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// Component public properties
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

    public $results = [
        ['test' => 'Maths', 'score' => 95,],
        ['test' => 'Physics', 'score' => 90],
        ['test' => 'Chemistry', 'score'=>96],
        ['test' => 'English', 'score' => 93],
        ['test' => 'Computer', 'score' => 98],
        ['test' => 'Maths', 'score' => 95,],
        ['test' => 'Physics', 'score' => 90],
        ['test' => 'Chemistry', 'score'=>96],
        ['test' => 'English', 'score' => 93],
        ['test' => 'Computer', 'score' => 98]
    ];

    public $page;
    public $page_size;
    public $total_records;
    public $total_pages;
    public $offset;
    public $page_first;
    public $page_prev;
    public $page_next; 
    public $page_last;

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// Component methods
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
    public function previousPage()
    {
        dump("dfbfsgnfgn");
    }

    /**
     * The page to display 
     * Usually is received in a url parameter
     *
     * @return void
     */
    public function getPageToDisplay(): void
    {
        $this->page = intval($_GET['page']);
        dump($this->page);
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
    /**
     *Set the number of records to display per page
     *
     * @return void
     */
    public function setPageSize(): void
    {
        $this->page_size = 3;
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
    /**
     * Calculate total number of records.
     *
     * @return void
     */
    public function getNumberOfRecords(): void
    {
        $this->total_records = count($this->results);
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
/**
     * Calculate total total number of pages.
     *
     * @return void
     */
    public function getNumberOfPages(): void
    {
        $this->total_pages = ceil($this->total_records / $this->page_size);
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
    /**
     * Validation: Page to display can not be greater
     * than the total number of pages.
     *
     * @return void
     */
    public function checkPageToDisplay()
    {
        if ($this->page > $this->total_pages) {
            $this->page = $this->total_pages;
        }
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
    /**
     *Page to display can not be less than 1
     *
     * @return void
     */
    public function checkPageIsNotLessThanOne(): void
    {
        if ($this->page < 1) {
            $this->page = 1;
        }
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
    /**
     * Calculate the position of the first record 
     * of the page to display
     *
     * @return void
     */
    public function setPositionOfFirstRecord(): void
    {
        $this->offset = ($this->page - 1) * $this->page_size;
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
    /**
     * Get the subset of records to be displayed 
     * from the array
     *
     * @return void
     */
    public function getSubsetOfRecordsToDisplay(): void
    {
        $this->results = array_slice($this->results, $this->offset, $this->page_size);
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
    /**
     * variables for pagination links
     *
     * @return void
     */
    public function paginationLinks()
    {
        $this->page_first = $this->page > 1 ? 1 : '';
        $this->page_prev  = $this->page > 1 ? $this->page-1 : '';
        $this->page_next  = $this->page < $this->total_pages ? $this->page + 1 : '';
        $this->page_last  = $this->page < $this->total_pages ? $this->total_pages : '';
        // dump($this->page_first);
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

    public function callPaginationMethods()
    {
        $this->getPageToDisplay();
        $this->setPageSize();
        $this->getNumberOfRecords();
        $this->getNumberOfPages();
        $this->checkPageToDisplay();
        $this->checkPageIsNotLessThanOne();
        $this->setPositionOfFirstRecord();
        $this->getSubsetOfRecordsToDisplay();
        $this->paginationLinks();
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=



public function render()
    {
        $this->callPaginationMethods();
        

        return view('livewire.tests.pagination-test', [
            'results' => $this->results,
            'page' => $this->page,
            'total_records' => $this->total_records,
            'total_pages' => $this->total_records,
            'page_size' => $this->page_size,
            'page_first' => $this->page_first,
            'page_prev' => $this->page_prev,
            'page_next' => $this->page_next,
            'page_last' => $this->page_last,
        ]);
    }
}















// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

// public function render()
// {
//     $this->cardSearchAPIurl(); 

//     $this->checkForCardSearchValueErrorException();

//     $this->showInputMessage();

//     // $this->cardSearchPagination();

//      return view('livewire.card-search.card-search-general', [
//         'cardSearchResults' => $this->cardSearchResults,
//         'responseMessage' => $this->responseMessage,
//         'totalCardsReturned' => $this->totalCardsReturned,
//         'undefined' => $this->undefined,   
//     ]);
// }

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// public function hydrate()
// {
//     $this->cardSearchResults = [];
    
//     $this->checkSearchInputEmpty();
    
// }
