<?php

namespace App\Http\Livewire\Tests;

use Livewire\Component;

class CauldronHomeToSearchTest extends Component
{
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// Properties.
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
    public $searchTerm;

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// Component non-lifecycle methods.
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
/**
 * Check to see if input value is null
 *
 * @return void
 */
    public function checkSearchTermIsEmpty(): void
    {
        // TODO - change 'empty' for a hash value .... 
        // shorthand way {{ $name or 'Default' ...
        isset($this->searchTerm) ? $this->searchTerm : $this->searchTerm = 'empty';
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
/**
 * Method returned from wire:keydown-enter in
 * component view. Check if input value set.
 * Pass to redirect.
 *
 * @return redirect
 */
    public function getSearchTerm()
    {
        $this->checkSearchTermIsEmpty();

        return redirect()->route('brew-test', [
            'searchTerm' => $this->searchTerm,
        ]);
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// Component lifecycle methods
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
/**
 * Check search term is empty before changes applied.
 *
 * @return void
 */
    // public function hydrate()
    // {
    //     $this->checkSearchTermIsEmpty();
    // }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
/**
 * Render component view with searchTerm prop.
 *
 * @return view
 */
    public function render()
    {
        return view('livewire.tests.cauldron-home-to-search-test');
    }
}
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// End of Component.
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
