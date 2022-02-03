<fieldset>
    <legend class="text-base font-medium text-gray-900">Time Period</legend>
    <div class="mt-2 bg-white rounded-md -space-y-px grid grid-cols-2 gap-2">
    @foreach(\Domain\Book\Model\TimePeriod::orderBy('approximately_from_year')->get() as $timePeriod)
        <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
            <label class="time-period-label rounded-tl-md rounded-tr-md relative border-2 p-4 flex cursor-pointer focus:outline-none {{$loop->first ? 'bg-indigo-50 border-indigo-200' : ''}}"
                _="on click
                        remove .bg-indigo-50  from .time-period-label
                        remove .border-indigo-200 from .time-period-label
                        add .bg-indigo-50  to me
                        add .border-indigo-200 to me
              ">
                <input type="radio" name="time_period" value="{{ $timePeriod->id }}" {{$loop->first ? 'checked' : ''}}
                       class="h-4 w-4 mt-0.5 cursor-pointer text-indigo-600 border-gray-400 focus:ring-indigo-500"
                       aria-labelledby="world-type-loop-label-{{$loop->count}}" aria-describedby="world-type-loop-description-{{$loop->count}}">
                <div class="ml-3 flex flex-col">
                    <span id="world-type-loop-label-{{$loop->count}}" class="block font-medium">{{$timePeriod->time_period_name}}</span>
                    <span id="world-type-loop-description-{{$loop->count}}" class="block text-sm text-gray-900/75">{{$timePeriod->time_period_description}}</span>
                </div>
            </label>
        @endforeach
    </div>
</fieldset>