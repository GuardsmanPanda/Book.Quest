<div class="flex flex-col min-h-full bg-gray-800 w-56">
    <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
        <nav class="flex-1 px-2 bg-gray-800 space-y-1" aria-label="Sidebar">
            @include('layout.component.menu-item', ['title' => 'Dashboard', 'url' => '/author', 'icon' => 'clipboard'])
            @include('layout.component.menu-item', ['title' => 'Find Authors', 'url' => '/author/find', 'icon' => 'clipboard'])
            @include('layout.component.menu-item', ['title' => 'Author Kanban', 'url' => '/author/kanban', 'icon' => 'user-group', 'counter' => 4])
            @include('layout.component.menu-item', ['title' => 'My Author List', 'url' => '/author/kanban', 'icon' => 'user-group', 'counter' => 4])
            @include('layout.component.menu-item', ['title' => 'My Author Map', 'url' => '/author/kanban', 'icon' => 'clipboard', 'counter' => 4])
            @include('layout.component.menu-item', ['title' => 'Random Author', 'url' => '/author/random', 'icon' => 'clipboard', 'counter' => 4])
        </nav>
    </div>
    <div class="flex-shrink-0 flex flex-col gap-2">
        @if(Infrastructure\Auth\Auth::hasPermission('author__create'))
            @include('layout.component.menu-button', ['text' => 'Add Author', 'url' => '/author/dialog-create'])
        @endif
        <div class=" flex bg-gray-700 p-4">
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
</div>