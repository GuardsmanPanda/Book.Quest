<x-dialog.create-resource endpoint="/series/create" title="Add Series">
    <div class="flex flex-col gap-4 pb-4">
        <div class="grid grid-cols-2 gap-2">
            <div>
                <label for="series_name" class="block text-sm font-medium text-gray-800">Series Name</label>
                <input type="text" name="series_name" id="series_name" required
                       class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"
                />
            </div>
            @include('form.input-autocomplete', ['name' => 'universe_search', 'label' => 'Universe', 'endpoint' => '/series/create/universe-search'])
        <input type="hidden" name="universe_id" id="universe_id" />
        </div>
        <div class="grid grid-cols-2 gap-2">
            <div>
                <label for="wikipedia_uri" class="block text-sm font-medium text-gray-800">Wikipedia URL</label>
                <input type="url" name="wikipedia_uri" id="wikipedia_uri"
                       class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"
                       placeholder="https://en.wikipedia.org/wiki/..."
                       pattern="https://en.(m.)?wikipedia.org/wiki/.*"
                />
            </div>
            <div>
                <label for="goodreads_uri" class="block text-sm font-medium text-gray-800">Goodreads URL</label>
                <input type="url" name="goodreads_uri" id="goodreads_uri"
                       class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"
                       placeholder="https://www.goodreads.com/series/..."
                       pattern="https://www.goodreads.com/series/.+"
                />
            </div>
        </div>

        @include('form.select-world-type', ['selected' => 'Real'])
        @include('form.select-time-period')
    </div>
</x-dialog.create-resource>