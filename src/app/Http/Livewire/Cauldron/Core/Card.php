<?php

namespace App\Http\Livewire\Cauldron\Core;

use Livewire\Component;
use App\Models\Cauldron\Card as CardModel;

class Card extends Component
{
    public $card = [];

    public $dbCard;

    public $dbCardId;

    public $card_sf_name;

    public $card_sf_id;

    public $card_sf_img_url;

    public $checkDBRecord;

    public $responseErrorMessage;

    protected $listeners = ['addCardToDB'];
        

    protected $rules = [
        'card_sf_name' => 'required|min:3',
        'card_sf_id' => 'required',
    ];

    public function addCardToDB($card)
    {
        $this->checkToSeeIfCardAlreadyExistsOnCardTable($card);
    }

    public function checkToSeeIfCardAlreadyExistsOnCardTable($card)
    {
        if (CardModel::where('card_sf_name', '=', $card['name'])->exists()) {
            $this->responseErrorMessage = "Sorry ... " . $card['name'] . " already exists in your collection";
            $this->dbCard = (CardModel::where('card_sf_name', '=', $card['name'])->get()->toJSON());
            $this->dbCard = json_decode($this->dbCard);
            // dd($this->dbCard[0]->id); //['items']['card']['attributes']['id']
            $this->dbCardId = $this->dbCard[0]->id;
            // dd($this->dbCardId);
            $this->emit('addCardToBrewCardPT', $this->dbCardId);
        } else {
            $this->validateCardData($card);
        }
        
    }

    public function validateCardData($card)
    {
        $this->card_sf_name = $card['name'];
        $this->card_sf_id = $card['id'];
        $this->card_sf_img_url = $card['image_uris']['normal'];

        $this->validate();

        $this->addCardToDatabase($card);
    }

    public function addCardToDatabase($card)
    {
        // $this->emit('addCardToBrewCardPT', $card);

        $this->dbCard = CardModel::create([
            'card_sf_name' => $card['name'],
            'card_sf_id' => $card['id'],
            'card_sf_img_url' => $card['image_uris']['normal'],
        ]);

        $this->dbCardId = $this->dbCard->id;
        $this->emit('addCardToBrewCardPT', $this->dbCardId);
    }

    public function hydrate()
    {
            $this->responseErrorMessage = '';
    }

    public function render()
    {
        return view('livewire.cauldron.core.card');
    }
}
