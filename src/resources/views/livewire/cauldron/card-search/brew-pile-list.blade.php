<div>
    <h1 class="text-red-600">LW BrewPileList Component</h1>
    @if ($cardBrewPileList)
        <h1>Brew Pile List</h1>
    @endif
    
    @foreach ($cardBrewPileList as $cardName)
        <p>{{ $cardName }}</p>
    @endforeach

</div>
