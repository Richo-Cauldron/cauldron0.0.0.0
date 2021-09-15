<div class="flex items-center mx-6 mt-8 bg-white rounded-full shadow-xl">

    <input wire:model.defer="searchTerm" wire:keydown.enter="{{ $keydownMethod }}" id="searchTxt" class="w-full px-6 py-4 leading-tight text-gray-700 border-0 rounded-full focus:outline-0 focus:border-current" id="search" type="text" placeholder="Search" value="{{ $searchTerm }}">

{{-- Mag-Glass-SVG --}}
    <div class="p-4">
        <button class="flex items-center justify-center w-12 h-12 p-2 text-white bg-blue-500 rounded-full hover:bg-blue-400 focus:outline-none">
            <svg class="flex" width="24" height="24">
                <path fill="white" stroke-width="0" id="svg_1" d="m15.5,14l-0.79,0l-0.28,-0.27c0.98,-1.14 1.57,-2.62 1.57,-4.23c0,-3.59 -2.91,-6.5 -6.5,-6.5s-6.5,2.91 -6.5,6.5s2.91,6.5 6.5,6.5c1.61,0 3.09,-0.59 4.23,-1.57l0.27,0.28l0,0.79l5,4.99l1.49,-1.49l-4.99,-5zm-6,0c-2.49,0 -4.5,-2.01 -4.5,-4.5s2.01,-4.5 4.5,-4.5s4.5,2.01 4.5,4.5s-2.01,4.5 -4.5,4.5z"/>
            </svg>
        </button>
    </div>
{{-- eoSVG --}}
</div>