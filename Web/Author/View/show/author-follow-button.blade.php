@if($status === 'follow')
    <button type="button" hx-patch="/author/{{$author_id }}/user-status" hx-target="this" hx-vals='{"status":null, "_token":"{{ csrf_token() }}"}'
            class="inline-flex items-center px-3 py-1.5 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Following
    </button>
@else
    <button type="button" @if(\Infrastructure\Auth\Service\Auth::id() === null)  onclick="dialog('/login/login-selector-dialog')" @else hx-patch="/author/{{$author_id }}/user-status" hx-target="this" hx-vals='{"status":"follow", "_token":"{{ csrf_token() }}"}' @endif
            class="inline-flex items-center px-3 py-1.5 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 opacity-70 hover:opacity-100">
        <svg class="-ml-0.5 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            {!! config("icons.plus") !!}
        </svg>
        Follow
    </button>
@endif