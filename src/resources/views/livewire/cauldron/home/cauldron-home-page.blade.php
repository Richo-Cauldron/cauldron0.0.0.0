<div>
    <div>
        <h1 class="text-red-600"><span class="text-black">Page Component: </span>
            app/Http/Livewire/Cauldron/Home/CauldronHomePage Component</h1>
        <h1 class="text-blue-600"><span class="text-black">Blade Component: </span>
        </h1>
    </div>
    
        
        @include('cauldron.includes._cardSearchInput', ['keydownMethod' => 'getAndSendSearchTerm'])

        {{-- <x-cauldron.card-search.card-search-input-svg  keydownMethod="getAndSendSearchTerm" title="blow me" /> --}}

        {{-- <livewire:cauldron.card-search.card-search-input :searchTerm="$searchTerm" keydownMethod="packageSearchTerm"> --}}

        {{-- GOTO fix the reload bounce somehow ????????????? from script below --}}
    <script>
        window.onpageshow = function (event) {
            if (event.persisted) {
                // document.getElementById("searchTxt").value = ''
                window.location.reload(); //reload page if it has been loaded from cache
            }
        };
    </script>
</div>
