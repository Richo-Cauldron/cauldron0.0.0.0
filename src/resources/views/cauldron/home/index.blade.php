@extends('layouts.app')

@section('content')

    <h1 class="font-semibold">{{strToUpper('Cauldron Home page')}}</h1>

    <h1 class="text-yellow-600"><span class="text-black">url: </span> http://localhost</h1>

    <h1 class="text-yellow-600"><span class="text-black">Controller: </span> Cauldron/HomeController@index()</h1>

    <h1 class="text-green-500"><span class="text-black">View: </span> app/resources/views/cauldron/home/index.b.p</h1>
    
    

    <livewire:cauldron.home.cauldron-home-page />

@endsection