<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The quest for more books">
    <title>Book.Quest</title>
    <script src="{{mix('/static/dist/app.js')}}" defer></script>
    @if(\Illuminate\Support\Facades\App::isLocal())
        <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    @endif
    <link rel="stylesheet" href="{{mix('/static/dist/app.css')}}">
</head>
<body class="min-h-screen" style="display: grid; grid-template-columns: 16rem auto;">
<div class="flex md:w-64 flex-col shadow-lg">
    <div class="flex flex-col flex-grow pt-2 overflow-y-auto">
        <div class="flex-grow flex flex-col">
            <nav class="flex-1 px-2 pb-4">
                <x-bear::sidebar.button path="/dashboard" icon="home" >Dashboard</x-bear::sidebar.button>
                <x-bear::sidebar.divider>Books</x-bear::sidebar.divider>
                <x-bear::sidebar.button path="/book/browse" icon="book-open" >Browse Books</x-bear::sidebar.button>
            </nav>
        </div>
    </div>
</div>
<div id="primary" class="px-4 py-4">{!! $content !!}</div>
<dialog id="dialog" class="p-0 shadow-xl rounded-sm">
    <div class="grid grid-cols-[auto_3rem] text-gray-800 justify-between h-12 items-center font-bold pl-4 gap-4 capitalize text-lg border-b-2 shadow-sm">
        <h3 id="dialog-title">Dialog</h3>
        <form method="dialog">
            <button class="hover:bg-red-500 align-middle hover:text-red-100 text-gray-500 transition-colors h-12 w-12 duration-75">
                <x-bear::icon class="mx-auto" size="6" name="x-mark"/>
            </button>
        </form>
    </div>
    <div id="dialog-content">Please report system error</div>
</dialog>
</body>
</html>