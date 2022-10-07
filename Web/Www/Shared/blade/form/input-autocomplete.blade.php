<div id="auto-input-{{$name}}" class="relative">
    <label for="{{$name}}" class="block text-sm font-medium text-gray-800">{{$label}}</label>
    <input type="text" name="{{$name}}" id="{{$name}}" placeholder="Search..." value="{{$prefill ?? ''}}"
           class="mt-1 peer shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"
           hx-trigger="keyup changed delay:300ms, search" hx-get="{{$endpoint}}" hx-target="#input-search-result"
    />
    <div id="input-search-result" class="absolute bg-indigo-50 invisible peer-focus:visible transition-all"></div>
</div>

