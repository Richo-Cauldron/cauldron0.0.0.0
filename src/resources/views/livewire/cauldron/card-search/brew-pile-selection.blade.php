<div>
    <h1 class="text-red-600">LW BrewPileSelection Component</h1>

    <label for="brewpile_id" id="brewpile_id">Brew Pile Selection:</label>
    <select wire:model="brewpile_id" class="" name="brewpile">

        <option selected="selected" value="">Choose Brewpile</option>

        @if ($brewpiles->count())
    
            @foreach($brewpiles as $brewpile)
                <option value="{{$brewpile->id}}">
                    {{ $brewpile->name }}
                </option>    
            @endforeach

        @endif
    
    </select>

    {{ $brewpile_id }} 
    <div>{{ $message }}</div>

    <div>
        <button x-data="{}" x-on:click="window.livewire.emitTo('cauldron.modals.create-brew-pile', 'show')">
            Create Brew Pile
        </button>
    </div>

    <livewire:cauldron.modals.create-brew-pile />
    
</div>