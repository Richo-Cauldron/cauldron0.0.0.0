<?php

namespace App\Http\Controllers\Cauldron;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardSearchController extends Controller
{
    public function index()
    {
        return view('cauldron.cardSearch.index');
    }
}
