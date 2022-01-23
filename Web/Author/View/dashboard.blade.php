Author Dashboard
<br>
@if(\Infrastructure\Http\Service\Htmx::getAreaFromHtmxHeader() !== 'author')
<div id="left-menu" hx-swap-oob="true">@include('layout.menu-author')</div>
@endif
