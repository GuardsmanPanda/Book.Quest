<?php declare(strict_types=1); ?>
<x-bear::dialog.crud type="create" submitText="Create" title="Add a new author" endpoint="/author/create">
    <x-bear::form.text id="goodreads_uri" required hx-get="/author/create" hx-trigger="keyup changed delay:500ms"
                       placeholder="https://www.goodreads.com/author/show/..." pattern="https://www.goodreads.com/author/show/[0-9]+.*">
        {{$goodreads_uri}}
    </x-bear::form.text>
</x-bear::dialog.crud>
<div class="flex flex-col gap-8 pb-4">
    <div class="flex flex-col gap-3">
        <div class="w-full">
            <label for="author_name" class="block text-sm font-medium text-gray-800">Author Name</label>
            <input type="text" name="author_name" id="author_name" value="{{$goodreads_data['author_name'] ?? ''}}"
                   class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"
                   required/>
        </div>
        <div class="grid grid-cols-3 gap-2 w-full">
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
                <label for="primary_language_id" class="block text-sm font-medium text-gray-800">Primary
                    Language</label>
                <input type="search" list="languages" name="primary_language_id" id="primary_language_id"
                       class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-400 rounded-md"/>
            </div>
        </div>
    </div>
</div>
