<?php

namespace Infrastructure\View\Provider;

use Illuminate\Support\ServiceProvider;

class ViewDomainProvider extends ServiceProvider {
    public function boot(): void {
        $this->loadViewsFrom(base_path(path: 'Web/Auth/View'), namespace: 'auth');
        $this->loadViewsFrom(base_path(path: 'Web/Author/View'), namespace: 'author');
        $this->loadViewsFrom(base_path(path: 'Web/Book/View'), namespace: 'book');
        $this->loadViewsFrom(base_path(path: 'Web/Dashboard/View'), namespace: 'dashboard');
        $this->loadViewsFrom(base_path(path: 'Web/Layout/View'), namespace: 'layout');
        $this->loadViewsFrom(base_path(path: 'Web/Narrator/View'), namespace: 'narrator');
        $this->loadViewsFrom(base_path(path: 'Web/Map/View'), namespace: 'map');
        $this->loadViewsFrom(base_path(path: 'Web/Series/View'), namespace: 'series');
        $this->loadViewsFrom(base_path(path: 'Web/Universe/View'), namespace: 'universe');
    }
}