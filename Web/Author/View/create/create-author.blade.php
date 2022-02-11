<x-dialog.create-resource endpoint="/author/create" title="Add Author">
    <div class="flex flex-col gap-8 pb-4">
        <div>
            <label for="goodreads_uri" class="block text-sm font-medium text-gray-800">Goodreads URI</label>
            <input type="url" name="goodreads_uri" id="goodreads_uri" value="{{$goodreads_uri}}"
                   class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"
                   placeholder="https://www.goodreads.com/author/show/..." pattern="https://www.goodreads.com/author/show/[0-9]+.*"
                   size="60" hx-get="/author/create/dialog" hx-trigger="keyup changed delay:500ms" hx-target="#pop"/>
        </div>
        <div class="flex flex-col gap-3">
            <div class="w-full">
                <label for="author_name" class="block text-sm font-medium text-gray-800">Author Name</label>
                <input type="text" name="author_name" id="author_name"   value="{{$goodreads_data['author_name'] ?? ''}}"
                       class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"
                       required/>
            </div>
            <div class="grid grid-cols-3 gap-2 w-full">
                <div class="">
                    <label for="birth_year" class="block text-sm font-medium text-gray-800">Birth Year</label>
                    <input type="number" name="birth_year" id="birth_year" value="{{$goodreads_data['birth_year'] ?? ''}}"
                           class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"/>
                </div>
                <div class="">
                    <label for="birth_date" class="block text-sm font-medium text-gray-800">Birth Date</label>
                    <input type="date" name="birth_date" id="birth_date" value="{{$goodreads_data['birth_date'] ?? ''}}"
                           class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"/>
                </div>
                <div class="">
                    <label for="death_date" class="block text-sm font-medium text-gray-8">Death Date</label>
                    <input type="date" name="death_date" id="death_date" value="{{$goodreads_data['death_date'] ?? ''}}"
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