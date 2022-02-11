<?php

namespace Infrastructure\View\Provider;

use Illuminate\Support\ServiceProvider;

class ViewDomainProvider extends ServiceProvider {
    public function boot(): void {
        if ($val = realpath(base_path('Web/Author/View'))){
            $this->loadViewsFrom($val, 'author');
        }
        if ($val = realpath(base_path('Web/Book/View'))){
            $this->loadViewsFrom($val, 'book');
        }
        if ($val = realpath(base_path('Web/Dashboard/View'))){
            $this->loadViewsFrom($val, 'dashboard');
        }
        if ($val = realpath(base_path('Web/Layout/View'))){
            $this->loadViewsFrom($val, 'layout');
        }
        if ($val = realpath(base_path('Web/Login/View'))){
            $this->loadViewsFrom($val, 'login');
        }
        if ($val = realpath(base_path('Web/Narrator/View'))){
            $this->loadViewsFrom($val, 'narrator');
        }
        if ($val = realpath(base_path('Web/Map/View'))){
            $this->loadViewsFrom($val, 'map');
        }
        if ($val = realpath(base_path('Web/Series/View'))){
            $this->loadViewsFrom($val, 'series');
        }
        if ($val = realpath(base_path('Web/Universe/View'))){
            $this->loadViewsFrom($val, 'universe');
        }
    }
}