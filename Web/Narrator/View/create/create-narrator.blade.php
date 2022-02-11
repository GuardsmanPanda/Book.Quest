<x-dialog.create-resource endpoint="/narrator/create" title="Add Narrator">
    <div class="flex flex-col gap-8 pb-4">
        <div>
            <label for="wikipedia_uri" class="block text-sm font-medium text-gray-800">Wikipedia URI</label>
            <input type="url" name="goodreads_uri" id="goodreads_uri"
                   class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"
                   placeholder="https://en.wikipedia.org/wiki/..." pattern="https://en.wikipedia.org/wiki/.+" size="60"/>
        </div>
        <div class="flex flex-col gap-3">
            <div class="w-full">
                <label for="narrator_name" class="block text-sm font-medium text-gray-800">Narrator Name</label>
                <input type="text" name="narrator_name" id="narrator_name"
                       class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"
                       required/>
            </div>
            <div class="grid grid-cols-3 gap-2 w-full">
                <div class="">
                    <label for="birth_year" class="block text-sm font-medium text-gray-800">Birth Year</label>
                    <input type="number" name="birth_year" id="birth_year"
                           class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"/>
                </div>
                <div class="">
                    <label for="birth_date" class="block text-sm font-medium text-gray-800">Birth Date</label>
                    <input type="date" name="birth_date" id="birth_date"
                           class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"/>
                </div>
                <div class="">
                    <label for="death_date" class="block text-sm font-medium text-gray-8">Death Date</label>
                    <input type="date" name="death_date" id="death_date"
                           class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"/>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-2 w-full">
                <div class="">
                    <label for="birth_country_id" class="block text-sm font-medium text-gray-800">Birth Country</label>
                    <input type="search" list="countries" name="birth_country_id" id="birth_country_id"
                           class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"/>
                </div>
                <div class="">
                    <label for="primary_language_id" class="block text-sm font-medium text-gray-800">Primary Language</label>
                    <input type="search" list="languages" name="primary_language_id" id="primary_language_id"
                           class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"/>
                </div>
            </div>
        </div>
    </div>
    <datalist id="countries" >
        @foreach(\Infrastructure\App\Model\Country::orderBy('country_name')->get() as $country)
            <option value="{{$country->id}}" class="leading-4">
                {{$country->country_name}}
            </option>
        @endforeach
    </datalist>
    <datalist id="languages" >
        @foreach(\Infrastructure\App\Model\Language::orderBy('language_name')->get() as $lang)
            <option value="{{$lang->id}}" class="leading-4">
                {{$lang->language_name}}
            </option>
        @endforeach
    </datalist>
</x-dialog.create-resource>