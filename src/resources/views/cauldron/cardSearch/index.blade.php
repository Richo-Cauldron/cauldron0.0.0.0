@extends('layouts.app')

@section('content')

{{-- -------------------------------------------------------------- --}}

<h1 class="font-semibold">{{strToUpper('Brew Init page')}}</h1>

<h1 class="text-yellow-600"><span class="text-black">url: </span> http://localhost/card/search?q=$searchTerm</h1>

<h1 class="text-indigo-600"><span class="text-black">sent from: </span> http://localhost with $searchTerm</h1>

<h1 class="text-yellow-600"><span class="text-black">Controller: </span> Cauldron/CardSearchController@index()</h1>

<h1 class="text-green-500"><span class="text-black">View: </span> resources/views/cauldron/cardSearch/index.b.p</h1>
    
{{-- -------------------------------------------------------------- --}}


<livewire:cauldron.card-search.brew-init />


@endsection