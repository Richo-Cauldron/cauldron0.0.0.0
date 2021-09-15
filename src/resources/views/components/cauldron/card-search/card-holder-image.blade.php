<div>

    @if (isset($card['image_uris']['normal']))

        <div class="box-border relative z-10 h-auto mx-auto mt-5 border border-green-800 rounded-lg w-44">
            <a class="cursor-pointer" href="/card/{{ $card['id']}}">
                <img class="z-0" src="{{$card['image_uris']['normal']}}" alt="{{$card['name']}}">
            </a>
        </div>

        <p>{{$card['name']}}</p>

    @else
        {{$undefined}}
    @endif
    
</div>