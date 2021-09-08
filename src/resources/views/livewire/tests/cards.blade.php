<div>
    <h1>Cards - Parent Component</h1>

    @foreach ($cards as $card)

        @livewire('tests.card-list', ['card' => $card])

    @endforeach

</div>
