<?php

namespace Austenc\Socialize;

use Austenc\Socialize\Tags\Socialize;
use Statamic\Providers\AddonServiceProvider;
use Statamic\Facades\CP\Nav;

class SocializeProvider extends AddonServiceProvider
{
    protected $publishables = [
        __DIR__ . '/../dist/buttons.css' =>  'css/buttons.css'
    ];

    protected $routes = [
        'cp' => __DIR__ . '/../routes/cp.php'
    ];

    protected $tags = [
        Socialize::class
    ];

    public function boot()
    {
        parent::boot();
        Nav::extend(function ($nav) {
            $nav->tools('Socialize')
                ->route('socialize.settings.index')
                ->icon('addons');
        });
    }
}
