<?php

namespace Austenc\Socialize\Tags;

use Statamic\Tags\Tags;
use Statamic\Facades\YAML;

class Socialize extends Tags
{
    public function index()
    {
        return view('socialize::buttons')->with([
            'layout' => $this->params->get('layout') ?? null,
        ] + (YAML::file(config('statamic.socialize.path'))->parse() ?? []));
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
