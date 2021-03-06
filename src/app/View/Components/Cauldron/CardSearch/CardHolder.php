<?php

namespace App\View\Components\Cauldron\CardSearch;

use Illuminate\View\Component;

class CardHolder extends Component
{
    public $card;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($card)
    {
        $this->card = $card;
        // dump($this->card);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cauldron.card-search.card-holder');
    }
}
