<div>
    <div>
        @foreach ($results as $row)
    
            <div>{{$row['test']}} : {{$row['score']}}</div>
            
        @endforeach
    </div>
    <div>
        @if ($total_records > $page_size)
            <a href="/paginate-test?page={{ $page_first }}">
                <button class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700"> 
                {!! __('« First') !!}
                </button>
            </a>
            <a href="/paginate-test?page={{ $page_prev }}">
                <button class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700"> 
                {!! __('« Previous') !!}
                </button>
            </a>
            <a href="/paginate-test?page={{ $page_next }}">
                <button class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700"> 
                {!! __('Next »') !!}
                </button>
            </a>
            <a href="/paginate-test?page={{ $page_last }}"> 
                <button class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700"> 
                {!! __('Last »') !!}
                </button>
            </a>
        @endif
    </div>

   {{-- +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+ --}} 

    
</div>
