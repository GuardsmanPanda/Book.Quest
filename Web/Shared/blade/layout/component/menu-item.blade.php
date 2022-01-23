<a href="{{$url}}"
   class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
    @include('layout.component.icon', ['icon' => $icon])
    <span class="flex-1">
          {{$title}}
    </span>

    @if(isset($counter))
        <span class="bg-gray-900 group-hover:bg-gray-800 ml-3 inline-block py-0.5 px-3 text-xs font-medium rounded-full">
          {{$counter}}
        </span>
    @endif
</a>