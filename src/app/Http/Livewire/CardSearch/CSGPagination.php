<?php

namespace App\Http\Livewire\CardSearch;

use Livewire\Component;

class CSGPagination extends Component
{
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// Component emitted events listener
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
    protected $listeners = ['cardSearchComplete' => 'setPaginationArray'];

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// Component public properties
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
    /**
     * Var to bind card search array recieved from emitted 
     * event cardSearchComplete from CSG component
     */
    public $paginationArray;
    public $page;
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// Component methods
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+
    /**
     * Undocumented funcSet pagination array from 
     * event cardSearchCompletetion
     *
     * @param array $array
     * @return array
     */
    public function setPaginationArray($array)
    {
        return $this->paginationArray = $array;
        dump($this->paginationArray);
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
/**
 * The page to display is usually is 
 * received in a url parameter
 *
 * @return void
 */
    public function getPageToDisplay(): void
    {
        if ($this->paginationArray) {
            $this->page = intval($_GET['search']);
        //  dump($this->page);
        }  
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
/**
 *Set the number of records to display per page.
*
* @return void
*/
    public function setPageSize(): void
    {
        $this->page_size = 10;
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
/**
 * Calculate total number of records.
 *
 * @return void
 */
    public function getNumberOfRecords(): void
    {
        if ($this->paginationArray) {
            $this->total_records = count($this->paginationArray);
        }
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
/**
 * Calculate total total number of pages.
 *
 * @return void
 */
    public function getNumberOfPages(): void
    {
        if ($this->paginationArray) {
            $this->total_pages = ceil($this->total_records / $this->page_size);
        }
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
        if ($this->paginationArray) {
            if ($this->page > $this->total_pages) {
                $this->page = $this->total_pages;
            }
        } 
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
 /**
 *Page to display can not be less than 1.
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
 * of the page to display.
 *
 * @return void
 */
    public function setPositionOfFirstRecord(): void
    {
        $this->offset = ($this->page - 1) * $this->page_size;
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
/**
 * Get the subset of records to be 
 * displayed from the array.
 *
 * @return void
 */
    public function getSubsetOfRecordsToDisplay(): void
    {
        if ($this->paginationArray) {
            $this->paginationArray = array_slice($this->paginationArray, $this->offset, $this->page_size);
        }
        
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
 /**
     * Set variables for pagination links.
     *
     * @return void
     */
    public function paginationLinks()
    {
        if ($this->paginationArray) {
            $this->page_first = $this->page > 1 ? 1 : '';
            $this->page_prev  = $this->page > 1 ? $this->page-1 : '';
            $this->page_next  = $this->page < $this->total_pages ? $this->page + 1 : '';
            $this->page_last  = $this->page < $this->total_pages ? $this->total_pages : '';
        }
        // dump($this->page_first);
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
 /**
 * Group pagination methods and call from 
 * one method callPaginationMethods.
 *
 * @return void
 */
    public function callPaginationMethods()
    {
        // $this->setPaginationArray();
        $this->getPageToDisplay();
        $this->setPageSize();
        $this->getNumberOfRecords();
        $this->getNumberOfPages();
        $this->checkPageToDisplay();
        $this->checkPageIsNotLessThanOne();
        $this->setPositionOfFirstRecord();
        $this->getSubsetOfRecordsToDisplay();
        $this->paginationLinks();
        $this->callPaginationViewParameters();
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
/**
     * Group view parameters in an array and call 
     * from one method callPaginationMethods 
     * from view render().
     *      
     * * @return void
     */
    public function callPaginationViewParameters(): void
    {
        if ($this->paginationArray) {
            $this->paginateViewParameters = [
                'paginationArray' => $this->paginationArray,
                'page' => $this->page,
                'total_records' => $this->total_records,
                'total_pages' => $this->total_records,
                'page_size' => $this->page_size,
                'page_first' => $this->page_first,
                'page_prev' => $this->page_prev,
                'page_next' => $this->page_next,
                'page_last' => $this->page_last,
            ];
        }
    }

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
    public function render()
    {
        $this->callPaginationMethods();

        if (! $this->paginationArray) {
            $this->paginateViewParameters = [];
        }

        return view('livewire.card-search.c-s-g-pagination', $this->paginateViewParameters);
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
}
