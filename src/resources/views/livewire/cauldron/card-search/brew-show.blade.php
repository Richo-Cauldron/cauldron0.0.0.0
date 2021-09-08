<div class="container ml-10">
    <br>
<hr>
<br>
<div><span class="font-semibold">CardId:</span>  {{$showCard['id']}}</div>
<div>
    <span class="font-semibold">Card Image:</span>  {{ $showCard['image_uris']['normal'] }}
</div>
<br><br>
<hr>
<br>
<div class="font-bold">Card Info</div>
<br>
<div><span class="font-semibold">Card Name:</span>{{ $showCard['name'] }} - {{ $showCard['mana_cost'] }}</div>
<div><span class="font-semibold">Card Type:</span>{{ $showCard['type_line'] }}</div>
<div>
    <span class="font-semibold">Card Text:</span>{{ $showCard['oracle_text'] }} <br>
        <span class="font-semibold">Card Flavor Text:</span>
    @if (isset($showCard['flavor_text']))
        {{ $showCard['flavor_text'] }}
    @else
        {{ $undefined }}
    @endif
</div>
<div><span class="font-semibold">Card P/T:</span>{{ $showCard['power'] }}/{{ $showCard['toughness'] }}</div>
<div><span class="font-semibold">Illustrated by:</span>  {{ $showCard['artist'] }}</div>
<br><br>
<hr>
<br>
<div class="font-bold">Card Legalities</div>
<br>
<ul>
@foreach ($showCard['legalities'] as $key => $legality)
    <li><span class="font-semibold">{{$key}}</span> {{$legality}}</li>
@endforeach
</ul>
<br><br>
<hr>
<br>
<div class="font-bold">Card Set Info</div>
<br>
<div><span class="font-semibold">Set Id:</span> {{ $showCard['set_id'] }}</div>
<div><span class="font-semibold">Set Name:</span>{{ $showCard['set_name'] }}</div>
<div><span class="font-semibold">Set Code:</span>{{ strtoupper($showCard['set'])}}</div>
<div><span class="font-semibold">Set Type:</span>{{ $showCard['set_type'] }}</div>
<div><span class="font-semibold">Set #</span> {{ $showCard['collector_number'] }}</div>
<div><span class="font-semibold">Card Rarity:</span>{{ $showCard['rarity'] }}</div>
<div><span class="font-semibold">Language:</span>{{ $showCard['lang']}}</div>






</div>