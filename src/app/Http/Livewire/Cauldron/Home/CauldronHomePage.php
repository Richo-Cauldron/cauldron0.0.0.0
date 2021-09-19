<?php

namespace App\Http\Livewire\Cauldron\Home;

use Livewire\Component;

class CauldronHomePage extends Component
{
// --------------------------------------------------
// Properties.
// --------------------------------------------------
    /** @var string */
    public $searchTerm;

    // protected $listeners = ['getAndSendSearchTerm'];

// --------------------------------------------------
// Component non-lifecycle methods.
// --------------------------------------------------

    /**
     * Method returned from wire:keydown-enter in
     * component view. Check if input value set.
     * Pass to redirect.
     *
     * @return redirect
     */
    public function getAndSendSearchTerm()
    {
        return redirect('/card/search?q='.$this->searchTerm);
    }

// --------------------------------------------------
// Component lifecycle methods
// --------------------------------------------------

    // public function hydrate()
    // {
    //     $this->getAndSendSearchTerm($this->searchTerm);
    // }
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

