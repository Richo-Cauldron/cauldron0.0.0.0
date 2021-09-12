<div>
    @if ($cardBrewPileList)
        <h1>Brew Pile List</h1>
    @endif
    
    @foreach ($cardBrewPileList as $cardName)
        <p>{{ $cardName }}</p>
    @endforeach

</div>
