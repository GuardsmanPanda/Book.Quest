<div class="grid gap-1 px-4 py-2">
    @foreach($result as $r)
        <button class="cursor-pointer text-left hover:bg-indigo-300 font-medium px-2 py-1"
                hx-get="/series/create/universe-search/{{$r->id}}" hx-target="#auto-input-universe_search">
            {{ $r->universe_name }}
        </button>
    @endforeach
</div>
<input type="hidden" name="universe_id" id="universe_id" hx-swap-oob="true"/>
