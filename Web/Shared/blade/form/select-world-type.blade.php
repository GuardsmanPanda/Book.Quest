<fieldset>
    <legend class="text-base font-medium text-gray-900">World Type</legend>
    <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-4">
        <label class="world-type-label w-72  relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none ring-2 ring-indigo-500"
               _="on click
                remove .ring-2 from .world-type-label
                add .ring-2 to me
                remove .invisible from #world-type-real-checkbox
                add .invisible to #world-type-hybrid-checkbox
                add .invisible to #world-type-fictional-checkbox
                ">
            <input type="radio" name="world_type" value="Real" class="sr-only" aria-labelledby="real-label"
                   aria-describedby="real-description" checked>
            <div class="flex-1 flex flex-col">
                <div class="flex justify-between">
                    <span id="real-label" class="block text-sm font-medium text-gray-900">Real</span>
                    <svg id="world-type-real-checkbox" class="h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                         fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                              clip-rule="evenodd"/>
                    </svg>
                </div>
                <span id="real-description" class="mt-1 flex items-center text-sm text-gray-500">
                    The world as we know it, without any magic.<br>
                    Most books are in this setting.
                </span>
            </div>

            <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
        </label>

        <label class="world-type-label w-72 relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none ring-indigo-500"
               _="on click
                remove .ring-2 from .world-type-label
                add .ring-2 to me
                add .invisible to #world-type-real-checkbox
                remove .invisible from #world-type-hybrid-checkbox
                add .invisible to #world-type-fictional-checkbox
                ">
            <input type="radio" name="world_type" value="Hybrid" class="sr-only" aria-labelledby="hybrid-label"
                   aria-describedby="hybrid-description">
            <div class="flex-1 flex flex-col">
                <div class="flex justify-between">
                    <span id="hybrid-label" class="block text-sm font-medium text-gray-900">Hybrid</span>
                    <svg id="world-type-hybrid-checkbox" class="h-5 w-5 text-indigo-600 invisible" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                         fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                              clip-rule="evenodd"/>
                    </svg>
                </div>
                <span id="hybrid-description" class="mt-1 flex items-center text-sm text-gray-500">
                    The world as we know it, but with a magical or fictional twist.<br>
                    Examples: Most Neil Gaiman books, post apocalypse settings, etc.
                </span>
            </div>

            <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
        </label>

        <label class="world-type-label w-72 relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none ring-indigo-500"
                _="on click
                remove .ring-2 from .world-type-label
                add .ring-2 to me
                add .invisible to #world-type-real-checkbox
                add .invisible to #world-type-hybrid-checkbox
                remove .invisible from #world-type-fictional-checkbox
                ">
            <input type="radio" name="world_type" value="Fictional" class="sr-only" aria-labelledby="fictional-label"
                   aria-describedby="fictional-description">
            <div class="flex-1 flex flex-col">
                <div class="flex justify-between">
                    <span id="fictional-label" class="block text-sm font-medium text-gray-900">Fictional</span>
                    <svg id="world-type-fictional-checkbox" class="h-5 w-5 text-indigo-600 invisible" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                         fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                              clip-rule="evenodd"/>
                    </svg>
                </div>
                <span id="fictional-description" class="mt-1 flex items-center text-sm text-gray-500">
                    The world as we know it, without any magic.<br>
                    Most books are in this setting.
                </span>
            </div>
            <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
        </label>
    </div>
</fieldset>
