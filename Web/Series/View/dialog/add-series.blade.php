<x-dialog.create-resource endpoint="/series" title="Add Series">
    <div class="flex flex-col gap-4 pb-4">
        <div>
            <label for="series_name" class="block text-sm font-medium text-gray-800">Series Name</label>
            <input type="tel" name="series_name" id="series_name" size="60" required
                   class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"
            />
        </div>
        <div>
            <label for="wikipedia_url" class="block text-sm font-medium text-gray-800">Wikipedia URL</label>
            <input type="url" name="wikipedia_url" id="wikipedia_url"   size="60"
                   class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"
                   placeholder="https://en.wikipedia.org/wiki/..."
                   pattern="https://en.(m.)?wikipedia.org/wiki/.*"
            />
        </div>
        @include('form.select-world-type')
        @include('form.select-time-period')
    </div>
</x-dialog.create-resource>