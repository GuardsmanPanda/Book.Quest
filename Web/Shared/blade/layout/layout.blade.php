<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The quest for more books">
    <title>{{ config('app.name') }}</title>
    <script src="{{mix('/static/dist/app.js')}}"></script>
    <link rel="stylesheet" href="{{mix('/static/dist/app.css')}}">
</head>
<body class="min-h-screen flex flex-col container mx-auto">
@include('layout.top-nav')
<div class="flex flex-1 h-full">
    <div id="left-menu">@include('layout.left-menu')</div>
    <div id="primary" class="flex-1 h-full px-4 py-2">
        {!! $content !!}
    </div>
</div>

<dialog id="general-dialog" class="p-0">
    <div class="flex bg-neutral-600 text-gray-100 justify-between h-8 items-center font-medium pl-4 gap-4 capitalize">
        <div id="pop-title">Dialog</div>
        <form method="dialog">
            <button class="w-8 h-8 hover:text-red-600 align-middle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </form>
    </div>
    <div class="px-6 pb-4 pt-2" id="pop">Please report system error</div>
</dialog>
<script>
    Dialog.registerDialog(document.getElementById('general-dialog'));
</script>
</body>
</html>