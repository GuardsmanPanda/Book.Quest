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
<body class="bg-neutral-100">
<nav class=" bg-neutral-800 px-4 text-neutral-400 font-bold absolute top-0 w-screen">
    <div class="flex justify-between mx-auto items-center">
        <div>
            <a href="/dashboard" class="flex space-x-2 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                <div>Book Quest</div>
            </a>
        </div>
        <div>
            Twitch, github, etc.
        </div>
    </div>
</nav>
<div class="mt-12 mx-auto">
    Hello, world!
</div>
</body>
</html>