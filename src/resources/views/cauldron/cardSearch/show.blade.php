@extends('layouts.app')

@section('content')

    <h1>Brew-show Page</h1>

    <livewire:cauldron.card-search.brew-show :cardId="$cardId" />
    
@endsection