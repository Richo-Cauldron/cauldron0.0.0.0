@extends('layouts.app')

@section('content')

<div>
    <button x-data="{}" x-on:click="window.livewire.emitTo('tests.contact-modal-test', 'show')">
        Contact Modal
    </button>
</div>
<div>
    <button x-data="{}" x-on:click="window.livewire.emitTo('tests.another-modal-test', 'show')">
        Another Modal
    </button>
</div>

    {{-- <livewire:tests.contact-modal-test /> --}}
    <div x-data>
        <button @click="alert('Alpine Js is working !')">Click</button>
    </div>
    
@endsection