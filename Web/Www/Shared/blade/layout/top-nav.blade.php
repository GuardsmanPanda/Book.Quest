<nav class="text-gray-400 font-bold w-full flex items-center px-4 text-lg border-gray-200 border-dashed border-b-2">
    <a href="/dashboard" class="flex py-2 gap-2 text-gray-800 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
        </svg>
        <div>Book.Quest</div>
    </a>
    <div class="flex flex-1 pl-6 items-center" hx-target="#primary">
        Search Box Here
    </div>
    <div>
        @if(\Infrastructure\Auth\Service\Auth::user() !== null)
            <div>{{\Infrastructure\Auth\Service\Auth::user()->display_name}}</div>
        @else
            <button onclick="dialog('/login/login-selector-dialog')" class="font-medium">Login</button>
        @endif
    </div>
</nav>
