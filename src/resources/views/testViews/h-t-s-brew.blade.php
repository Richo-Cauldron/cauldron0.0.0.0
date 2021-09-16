@extends('layouts.app')

@section('content')
    <div>
        <h1> h-t-s-BREW page</h1>

        <livewire:tests.h-t-s-brew :searchTerm="$searchTerm">
    </div>
@endsection