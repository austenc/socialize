<?php

namespace Austenc\Socialize;

use Austenc\Socialize\Tags\Socialize;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $publishables = [
        __DIR__ . '/../dist/buttons.css' =>  'css/buttons.css'
    ];

    protected $tags = [
        Socialize::class
    ];
}
