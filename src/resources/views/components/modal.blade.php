<div
    x-data="{
        show: @entangle($attributes->wire('model')).defer
    }"
    x-show="show"
    x-on:keydown.escape.window="show = false"
    class="fixed inset-0 z-40 px-4 py-6 overflow-y-auto md:py-24 sm:px-0">

    <div x-show="show" class="fixed inset-0 transform" x-on:click="show = false">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    
    <div x-show="show" class="max-w-lg overflow-hidden transform bg-white rounded-lg sm:w-full sm:mx-auto">
        {{$slot}}
    </div>
   
</div>