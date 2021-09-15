@extends('layouts.app')

@section('content')

{{-- -------------------------------------------------------------- --}}

<h1 class="font-semibold">{{strToUpper('Brew-show Page')}}</h1>

<h1 class="text-yellow-600"><span class="text-black">url: </span> http://localhost/card/$card_id</h1>

<h1 class="text-indigo-600"><span class="text-black">sent from: </span> http://localhost/card/search?q=$searchTerm card link</h1>

<h1 class="text-yellow-600"><span class="text-black">Controller: </span> Cauldron/CardSearchController@show()</h1>

<h1 class="text-green-500"><span class="text-black">View: </span> resources/views/cauldron/cardSearch/show.b.p</h1>
    
{{-- -------------------------------------------------------------- --}}

<h1></h1>

    <livewire:cauldron.card-search.brew-show :cardId="$cardId" />
    
@endsection