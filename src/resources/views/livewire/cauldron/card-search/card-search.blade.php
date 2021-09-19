<div>

    @include('cauldron.includes._cardSearchInput', ['keydownMethod' => 'resendPage']) 

        {{-- $responseMessage from CardSearch component--}}
                
        <span> {{ $responseMessage }}</span>

        {{-- iterate over cardSearchResults using blade component card-holder
             to house multiple components to hold and action a card --}}

    @foreach ( $cardSearchResults  as $card)

        <x-cauldron.card-search.card-holder :card="$card" :wire:key="$loop->index" />

    @endforeach

</div>
