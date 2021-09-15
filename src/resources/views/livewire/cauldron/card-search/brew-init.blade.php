<div>
    {{-- ------------------------------------------------------- --}}
    {{-- BrewInit intellection --}}
    {{-- ------------------------------------------------------- --}}
    
    <div id="intellection">
        {{-- intellection --}}
        <h1 class="text-red-600"><span class="text-black">Page Component: </span>
            app/Http/Livewire/Cauldron/CardSearch/BrewInit Component</h1>
        <h1 class="text-blue-600"><span class="text-black">Component Include: </span>
            views/Cauldron/includes/_cardSearchInput.b.p</h1>  

        {{-- intellection --}}
        <p>Nested components: </p>

        {{-- intellection --}}
        <li class="text-red-600">LW - Cauldron/Core/Card Component</li>
        <li class="ml-8 text-purple-600">
            emits 'addCardToBrewCardPT'-><span class="text-red-600">'BrewPileSelection'</span> component
            </span>from <span class="text-red-800">public function addCardToDB($card)
                </span> in <span class="text-red-600">Card</span> component.
        </li>

        {{-- intellection --}}
        <li class="text-red-600">LW - Cauldron/CardSearch/BrewPileSelection Component</li>
            
        {{-- intellection --}}
        <li class="text-gray-600">
            <span>Blade cauldron/card-holder Component foreach()   
            </span>
        </li>

        {{-- intellection --}}
        <div class="ml-8">
            <li class="text-red-600">
                LW - Cauldron/CardSearch/CardHolderImage Component.
            </li>
            <li class="text-red-600">
                LW - Cauldron/CardSearch/CardHolderNav Component.
            </li>
        </div>

        {{-- intellection --}}
        <div class="ml-12">
            <li class="text-purple-600">
                emits event 'cardForBrewPile'-> <span class="text-red-600">'BrewPileList'</span>
                from <span class="text-red-800">addToBrew()</span> in <span class="text-red-600">CardHolderNav</span> component.
            </li>
            <li class="text-purple-600">
                emits 'addCardToDB'->  <span class="text-red-600">'Card' </span>from <span class="text-red-800">addToBrew()</span> in <span class="text-red-600">CardHolderNav</span> component.
            </li>
        </div>

        {{-- intellection --}}
        <li class="text-red-600">
            LW - Cauldron/CardSearch/BrewPileList Component.
        </li>
    
    </div>

    {{-- ------------------------------------------------------- --}}
    {{-- brew-init-component-page --}}
    {{-- ------------------------------------------------------- --}}

    {{-- Card search input --}}
    
    @include('cauldron.includes._cardSearchInput', ['keydownMethod' => 'resendPage'])

    {{-- sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-5 --}}
    <div class="grid grid-cols-1 gap-8 ml-10 bg-gray-300">

        {{-- $responseMessage from BrewInit component--}}
                
        <span> {{ $responseMessage }}</span>

        {{--core.Card LW component - Listens for addCardToDatabase event sent from 
            x-card-holder.lw-card-holder-nav wire:click="addToBrew"
            emits event addCardToBrewCardPT to BrewPileSelection component--}}

        <div>
            <livewire:cauldron.core.card />
        </div>

        {{--Brewpile->name selection of DB records --}}

        <livewire:cauldron.card-search.brew-pile-selection />
       

       
        {{-- intellection --}}
        <p class="text-gray-600">
            <span>Blade cauldron/card-holder Component foreach()   
            </span>
        </p>

         {{-- iterate over cardSearchResults using blade component card-holder
             to house multiple components to hold and action a card --}}
        @foreach ( $cardSearchResults  as $card)

            <x-cauldron.card-search.card-holder :card="$card" :wire:key="$loop->index" />

        @endforeach


    {{--Brew Pile pst LW component - Listens for cardForBrewPile event 
    sent from card-holder-nav wire:click="addToBrew"--}}

        <div>
            <livewire:cauldron.card-search.brew-pile-list />
        </div>
  
   </div>
   
</div>
