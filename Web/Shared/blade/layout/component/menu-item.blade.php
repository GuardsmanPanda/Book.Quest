<a href="{{$url}}" hx-fastnav
   class="text-gray-500 hover:bg-gray-200/50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
    @include('layout.component.icon', ['icon' => $icon])
    <span class="flex-1">
          {{$title}}
    </span>
</a>