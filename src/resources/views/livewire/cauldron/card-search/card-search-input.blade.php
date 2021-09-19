<div class="flex items-center mx-6 mt-8 bg-white rounded-full shadow-xl">

    <input wire:model.defer="searchTerm" wire:keydown.enter="{{ $keydownMethod }}" id="searchTxt" class="w-full px-6 py-4 leading-tight text-gray-700 border-0 rounded-full focus:outline-0 focus:border-current" id="search" type="text" placeholder="Search" >

    <x-cauldron.card-search.card-search-input-svg  />

</div>