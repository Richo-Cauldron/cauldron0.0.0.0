<?php

namespace App\Http\Livewire\Cauldron\CardSearch;

use Livewire\Component;
use App\Models\Cauldron\Card;
use App\Models\Cauldron\Brewpile;

class BrewPileSelection extends Component
{
    public $brewpile_id;

    public $brewpile_name;

    public $brewpiles = [];

    public $message;

    protected $listeners = ['addCardToBrewCardPT'];

     /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->getBrewpiles();
    }

    public function getBrewpiles()
    {
        $this->brewpiles = Brewpile::all(); 
    }

    // public function updatedBrewpile_Id()
    // {
    //     $this->pile = Brewpile::where('id', $this->brewpile_id)->get();
    //     //  dd($this->pile);
    //     $this->brewpile_id = $this->pile->pluck('id');
    //     $this->brewpile_name = $this->pile->pluck('name');
    //     // dd($this->brewpile_id);
    // }

    public function addCardToBrewCardPT($cardId)
    {
            $card = Card::find($cardId);
            // dd($this->brewpile_id);
            $bp = Brewpile::find($this->brewpile_id);
            // dd($bp);
            if ($bp === null) {
                $this->message = "Please choose or create a Brew Pile";
            } else {
                $bpName = $bp['name'];
            // dd($card['card_sf_name']);
                $card->brewpiles()->attach($this->brewpile_id);
                $this->message = $card['card_sf_name'] . ' successfully added to '  .  $bpName;
            }
            
        // sure this can be done with M2M rel syntax ......
    }

    public function render()
    {
        return view('livewire.cauldron.card-search.brew-pile-selection');
    }
}
