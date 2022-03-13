<div class="grid  lg:grid-cols-2 xl:grid-cols-3 gap-4">
    <div class="space-y-6">
        <x-section>
            <x-slot:title>{{$author->author_name}}</x-slot:title>
            <div class="space-y-2">
                <div class="col-span-2 bg-gray-100">Picture</div>
                <div class="grid grid-cols-2 space-y-2">
                    <div class="sm:col-span-1">
                        <div class="text-sm font-medium text-gray-500">Follower</div>
                        <div class="ml-2 text-sm text-gray-900">{{$author->follow_count}}</div>
                    </div>
                    @include('author::show.author-follow-button', ['status' => $author->status, 'author_id' => $author->id])
                    <div class="sm:col-span-1">
                        <div class="text-sm font-medium text-gray-500">Birth Date</div>
                        <div class="ml-2 text-sm text-gray-900">{{$author->birth_date}}</div>
                    </div>
                    <div class="sm:col-span-1">
                        <div class="text-sm font-medium text-gray-500">Died</div>
                        <div class="ml-2 text-sm text-gray-900">{{$author->death_date}}</div>
                    </div>
                </div>
            </div>
        </x-section>
        <x-section>
            <x-slot:title>Series</x-slot:title>
            Series
        </x-section>
        <x-section>
            <x-slot:title>Universes</x-slot:title>
            Universes
        </x-section>
    </div>
    <div class="xl:col-span-2 space-y-6">
        <x-section>
            <x-slot:title>Biography</x-slot:title>
            Hello
        </x-section>
        <x-section>
            <x-slot:title>Books</x-slot:title>
            Books
        </x-section>
    </div>
</div>
