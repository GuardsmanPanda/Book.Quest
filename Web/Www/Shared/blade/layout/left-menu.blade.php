<div class="w-52 px-4 pt-2 space-y-6 pl-4 border-r-2 min-h-full border-gray-200 border-dashed">
    <div class="grid">
        <div class="relative">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="px-2 bg-white text-lg font-medium text-gray-900">Books</span>
            </div>
        </div>
        @include('layout.left-menu-item', ['url' => '/book/find', 'title' => 'Find Books'])
        @include('layout.left-menu-item', ['url' => '/book/random', 'title' => 'Random Book'])
    </div>
    <div class="grid">
        <div class="relative">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="px-2 bg-white text-lg font-medium text-gray-900">Authors</span>
            </div>
        </div>
        @include('layout.left-menu-item', ['url' => '/author/find', 'title' => 'Find Authors'])
        @include('layout.left-menu-item', ['url' => '/author/random', 'title' => 'Random Author'])
    </div>
    <div class="grid">
        <div class="relative">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="px-2 bg-white text-lg font-medium text-gray-900">Series</span>
            </div>
        </div>
        @include('layout.left-menu-item', ['url' => '/series/find', 'title' => 'Find Series'])
        @include('layout.left-menu-item', ['url' => '/series/random', 'title' => 'Random Series'])
    </div>
    @if(\Infrastructure\Auth\Service\Auth::hasRole('curator'))
        <div class="grid">
            <div class="relative">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="px-2 bg-white text-lg font-medium text-gray-900">Curate</span>
                </div>
            </div>
            @include('layout.left-menu-add-item', ['url' => '/author/create/dialog', 'title' => 'Add Author'])
            @include('layout.left-menu-add-item', ['url' =>  '/narrator/create/dialog', 'title' => 'Add Narrator'])
            @include('layout.left-menu-add-item', ['url' =>  '/series/create/dialog', 'title' => 'Add Series'])
            @include('layout.left-menu-add-item', ['url' =>  '/universe/dialog-create', 'title' => 'Add Universe'])
        </div>
    @endif
</div>