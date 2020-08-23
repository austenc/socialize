<?php

namespace Austenc\Socialize;

use Austenc\Socialize\Tags\Socialize;
use Statamic\Facades\CP\Nav;
use Statamic\Providers\AddonServiceProvider;

class SocializeProvider extends AddonServiceProvider
{
    protected $stylesheets = [
        __DIR__.'/../dist/buttons.css',
    ];

    protected $routes = [
        'cp' => __DIR__.'/../routes/cp.php',
    ];

    protected $tags = [
        Socialize::class,
    ];

    public function boot()
    {
        parent::boot();
        Nav::extend(function ($nav) {
            $nav->tools('Socialize')
                ->route('socialize.settings.index')
                ->icon('users-multiple');
        });
    }

    public function register()
    {
        parent::register();

        $this->mergeConfigFrom(__DIR__.'/../config/socialize.php', 'statamic.socialize');
    }
}
