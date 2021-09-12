<?php

namespace App\Http\Livewire\Cauldron\Core;

use Livewire\Component;
use App\Models\Cauldron\Card as CardModel;

class Card extends Component
{
    public $card = [];

    public $card_sf_name;

    public $card_sf_id;

    public $card_sf_img_url;

    protected $listeners = ['addCardToDatabase'];

    protected $rules = [
        'card_sf_name' => 'required|min:3',
        'card_sf_id' => 'required',
    ];

    public function addCardToDatabase($card)
    {
        $this->card = $card;

        $this->card_sf_name = $card['name'];
        $this->card_sf_id = $card['id'];
        $this->card_sf_img_url = $card['image_uris']['normal'];

        $this->validate();

        CardModel::create([
            'card_sf_name' => $this->card_sf_name,
            'card_sf_id' => $this->card_sf_id,
            'card_sf_img_url' => $this->card_sf_img_url,
        ]);
        // dump($this->card);
    }

    public function render()
    {
        return view('livewire.cauldron.core.card');
    }
}
