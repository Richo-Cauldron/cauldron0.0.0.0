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
<div>{{ $showCard['name'] }} - {{ $showCard['mana_cost'] }}</div>
<div>{{ $showCard['type_line'] }}</div>
<div>
    {{ $showCard['oracle_text'] }} <br>
    {{ $showCard['flavor_text'] }}
</div>
<div>{{ $showCard['power'] }}/{{ $showCard['toughness'] }}</div>
<div><span class="font-semibold">Illustrated by:</span>  {{ $showCard['artist'] }}</div>
<br><br>
<hr>
<br>
<div class="font-bold">Card Legalities</div>
<br>
<ul>
@foreach ($showCard['legalities'] as $key => $legality)
    <li>{{$key}} : {{$legality}}</li>
@endforeach
</ul>
<br><br>
<hr>
<br>
<div class="font-bold">Card Set Info</div>
<br>
<div><span class="font-semibold">Set id:</span> {{ $showCard['set_id'] }}</div>
<div>{{ $showCard['set_name'] }}</div>
<div>{{ strtoupper($showCard['set'])}}</div>
<div>{{ $showCard['set_type'] }}</div>
<div><span class="font-semibold"></span> Set id: {{ $showCard['set_id'] }}</div>
<div><span class="font-semibold">Set #</span> {{ $showCard['collector_number'] }}</div>
<div>{{ $showCard['rarity'] }}</div>
<div>{{ $showCard['lang']}}</div>






</div>