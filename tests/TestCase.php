<?php

namespace Austenc\Socialize\Tests;

use Austenc\Socialize\SocializeProvider;
use Statamic\Statamic;
use Statamic\Extend\Manifest;
use Statamic\Providers\StatamicServiceProvider;
use Orchestra\Testbench\TestCase as TestbenchTestCase;

class TestCase extends TestbenchTestCase
{
    protected function getPackageProviders($app)
    {
        return [StatamicServiceProvider::class, SocializeProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Statamic' => Statamic::class,
        ];
    }
}
