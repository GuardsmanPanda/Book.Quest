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
                <x-bear::sidebar.link path="/dashboard" icon="home">Dashboard</x-bear::sidebar.link>
                <x-bear::sidebar.divider>Books</x-bear::sidebar.divider>
                <x-bear::sidebar.link path="/book/browse" icon="book-open">Browse Books</x-bear::sidebar.link>
            </nav>
            @if(\GuardsmanPanda\Larabear\Infrastructure\Auth\Service\BearAuthService::getUserId() === null)
                <x-bear::buttonDark class="mx-4 mb-4" hx-get="/auth/login-dialog" hx-target="#dialog-content">Test Login</x-bear::buttonDark>
            @else
                <div class="flex">
                    <x-bear::buttonDark class="mx-4 mb-4 block">A</x-bear::buttonDark>
                    <x-bear::buttonDark class="mx-4 mb-4 block">N</x-bear::buttonDark>
                </div>
                <div class="mx-4 mb-4">
                    {{\GuardsmanPanda\Larabear\Infrastructure\Auth\Service\BearAuthService::getUser()->user_display_name}}
                </div>
            @endif
        </div>
    </div>
</div>
<div id="primary" class="px-4 py-4">{!! $content !!}</div>
<x-bear::dialog.layout/>
</body>
</html>