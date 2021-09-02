<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        return view('cardsearch.index');
    }

    public function show($cardId)
    {
        return view('cardsearch.show', [
            'cardId' => $cardId,
        ]);
    }
}