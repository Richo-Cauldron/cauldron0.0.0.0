<?php

namespace App\Http\Controllers\Cauldron;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('cauldron.home.index');
    }
}
