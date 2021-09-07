<?php

namespace App\Http\Livewire\Cauldron\Home;

use Livewire\Component;

class CauldronHomePage extends Component
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
    // public function checkSearchTermIsEmpty(): void
    // {
    //     // TODO - change 'empty' for a hash value .... 
    //     // shorthand way {{ $name or 'Default' ...
    //     isset($this->searchTerm) ? $this->searchTerm : $this->searchTerm = '';
    // }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
/**
 * Method returned from wire:keydown-enter in
 * component view. Check if input value set.
 * Pass to redirect.
 *
 * @return redirect
 */
    public function getAndSendSearchTerm()
    {
        // $this->checkSearchTermIsEmpty();

        return redirect('/card/search?q='.$this->searchTerm);
    }
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// Component lifecycle methods
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
/**
 * Render component view with searchTerm prop.
 *
 * @return view
 */
    public function render()
    {
        return view('livewire.cauldron.home.cauldron-home-page');
    }
}
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// End of Component.

