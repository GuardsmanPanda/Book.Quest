<?php

namespace Infrastructure\View\Provider;

use Illuminate\Support\ServiceProvider;

class ViewDomainProvider extends ServiceProvider {
    public function boot(): void {
        $this->loadViewsFrom(realpath(base_path('Web/Author/View')), 'author');
        $this->loadViewsFrom(realpath(base_path('Web/Book/View')), 'book');
        $this->loadViewsFrom(realpath(base_path('Web/Dashboard/View')), 'dashboard');
        $this->loadViewsFrom(realpath(base_path('Web/Layout/View')), 'layout');
        $this->loadViewsFrom(realpath(base_path('Web/Login/View')), 'login');
    }
}