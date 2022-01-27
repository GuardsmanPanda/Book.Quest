<div class="flex flex-col min-h-full bg-gray-800 w-56">
    <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
        <nav class="flex-1 px-2 bg-gray-800 space-y-1" aria-label="Sidebar">
            @include('layout.component.menu-item', ['title' => 'Author Home', 'url' => '/author', 'icon' => 'home'])
            @include('layout.component.menu-item', ['title' => 'Find Authors', 'url' => '/author/find', 'icon' => 'clipboard'])
            @include('layout.component.menu-item', ['title' => 'Author Kanban', 'url' => '/author/kanban', 'icon' => 'user-group', 'counter' => 4])
            @include('layout.component.menu-item', ['title' => 'My Author List', 'url' => '/author/kanban', 'icon' => 'user-group', 'counter' => 4])
            @include('layout.component.menu-item', ['title' => 'My Author Map', 'url' => '/author/kanban', 'icon' => 'clipboard', 'counter' => 4])
            @include('layout.component.menu-item', ['title' => 'Random Author', 'url' => '/author/random', 'icon' => 'clipboard', 'counter' => 4])
        </nav>
    </div>
    <div class="flex-shrink-0 flex flex-col gap-2">
        @if(\Infrastructure\Auth\Service\Auth::hasPermission('author__create'))
            @include('layout.component.menu-button', ['text' => 'Add Author', 'url' => '/author/dialog-create'])
        @endif
        <div class="bg-gray-700 p-2">
            <a href="#" class="flex-shrink-0 w-full group block p-2">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="text-gray-500 group-hover:text-gray-300 mr-1 flex-shrink-0 h-8 w-8"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        {!! config("icons.cube") !!}
                    </svg>
                    <p class="text-lime-400 font-medium text-3xl">372</p>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">Authors</p>
                        <p class="text-xs font-medium text-gray-300 group-hover:text-gray-200">Perused</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>