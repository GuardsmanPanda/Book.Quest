@include('form.input-autocomplete', [
    'name' => 'universe_search',
    'label' => 'Universe',
     'endpoint' => '/series/create/universe-search',
     'prefill' =>$universe->universe_name
])
@include('form.select-world-type', ['selected' =>$universe->world_type, 'oob' => true])
<input type="hidden" name="universe_id" id="universe_id" value="{{$universe->id}}" hx-swap-oob="true"/>