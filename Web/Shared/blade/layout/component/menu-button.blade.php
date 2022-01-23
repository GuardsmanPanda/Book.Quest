<button onclick="dialog('{!! $url !!}')" class="mx-1 text-emerald-400 hover:bg-gray-700 hover:text-emerald-200 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
    <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-emerald-300 mr-3 flex-shrink-0 h-6 w-6"
         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
        {!! config("icons.plus") !!}
    </svg>
    <span class="flex-1 text-left">
              {{ $text }}
        </span>
</button>