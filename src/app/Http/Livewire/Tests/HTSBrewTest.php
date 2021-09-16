<?php

namespace App\Http\Livewire\Tests;

use Livewire\Component;

class HTSBrewTest extends Component
{
    public $searchTerm;
    public $methodResponse;
    public $errorMessage;

    public function getSearchTerm()
    {
        $this->methodResponse = $this->searchTerm;

        $this->checkSearchTermIsEmpty();

        return redirect()->back()->with("message", "redirected with $this->searchTerm");
    }

    // public function mount()
    // {
    //     $this->checkSearchTermIsEmpty();
    //     $this->methodResponse = $this->searchTerm;
    // }

    // public function hydrate()
    // {
    //     $this->checkSearchTermIsEmpty();
    // }

    public function checkSearchTermIsEmpty()
    {
        if ($this->searchTerm === 'empty' || $this->searchTerm === '') {
            $this->searchTerm = '';
            $this->errorMessage = 'Doh ...!';
        }
        else {
            $this->errorMessage = '';
        }
    }

    public function render()
    {
        // dump($this->searchTerm);
        $this->checkSearchTermIsEmpty();

        return view('livewire.tests.h-t-s-brew', [
            'searchTerm' => $this->searchTerm,
            'errorMessage' => $this->errorMessage,

        ]);
    }
}
