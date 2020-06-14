<?php

namespace Austenc\Socialize\Tags;

use Statamic\Tags\Tags;

class Socialize extends Tags
{
    public function index()
    {
        return view('socialize::buttons');
    }

    public function css()
    {
        return '<link rel="stylesheet" href="/vendor/socialize/css/buttons.css">';
    }

    public function boot()
    {
        parent::boot();
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'socialize');
    }
}
