<div>
    <div class="grid h-auto m-10 border border-black w-52 grid-cols4">
        <div class="box-border relative z-10 h-auto mx-auto mt-5 border border-gray-400 rounded-lg w-44">
            <a class="cursor-pointer" href="/card/{{ $item['id']}}">
                <img class="z-0" src="{{$item['image_uris']['normal']}}" alt="">
            </a>
        </div>
        <div class="flex justify-between w-auto mt-3 mb-3 border border-red-800">
            <button class="w-20 px-4 py-2 ml-4 font-bold text-white bg-blue-300 rounded-sm hover:bg-blue-500">
                Button
            </button>
            <button wire:click="addToBrew" class="w-20 px-4 py-2 mr-4 font-bold text-white bg-blue-300 rounded-sm hover:bg-blue-500">
                Brew
            </button>
        </div>
    </div>
</div>
