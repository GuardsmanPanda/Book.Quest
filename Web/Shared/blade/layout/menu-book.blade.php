<div class="flex flex-col min-h-full bg-gray-800 w-56">
    <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
        <nav class="flex-1 px-2 bg-gray-800 space-y-1" aria-label="Sidebar">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class="bg-gray-900 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <!--
                  Heroicon name: outline/home

                  Current: "text-gray-300", Default: "text-gray-400 group-hover:text-gray-300"
                -->
                <svg class="text-gray-300 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="flex-1">
          Book Home
        </span>
            </a>
            @include('layout.component.menu-item', ['title' => 'Find Books', 'url' => '/book/find', 'icon' => 'clipboard'])
            @include('layout.component.menu-item', ['title' => 'Book Kanban', 'url' => '/book/kanban', 'icon' => 'clipboard'])
            @include('layout.component.menu-item', ['title' => 'My Book List', 'url' => '/book/my-list', 'icon' => 'clipboard'])
            @include('layout.component.menu-item', ['title' => 'My Book Map', 'url' => '/book/my-map', 'icon' => 'clipboard'])
            @include('layout.component.menu-item', ['title' => 'Random Book', 'url' => '/book/random', 'icon' => 'clipboard'])
        </nav>
    </div>
    <div class="flex-shrink-0 flex bg-gray-700 p-4">
        <a href="#" class="flex-shrink-0 w-full group block">
            <div class="flex items-center">
                <div>
                    <img class="inline-block h-9 w-9 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-white">
                        Tom Cook
                    </p>
                    <p class="text-xs font-medium text-gray-300 group-hover:text-gray-200">
                        View profile
                    </p>
                </div>
            </div>
        </a>
    </div>
</div>