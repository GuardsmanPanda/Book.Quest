@props(['title', 'endpoint'])
<form id="dialog-form" hx-patch="{!! $endpoint !!}" autocomplete="off">
    <x-idempotency-key></x-idempotency-key>
    <x-csrf-token></x-csrf-token>
    {{$slot}}
</form>
<div class="border-t flex gap-2 pt-2 flex-row-reverse">
    <form method="dialog">
        <button class="shadow inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
            Cancel
        </button>
    </form>
    <button form="dialog-form"
            class="shadow inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Update
    </button>
</div>
<div id="pop-title" hx-swap-oob="true">{{$title}}</div>