@props(['value' => null])
<input hidden name="_idempotency" value="{{$value ?? \Illuminate\Support\Str::random()}}">
