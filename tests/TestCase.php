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

    /**
     * Load Environment
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);

        $app->make(Manifest::class)->manifest = [
            'austenc/socialize' => [
                'id'        => 'austenc/socialize',
                'namespace' => 'Austenc\\Socialize\\',
            ],
        ];
    }

    /**
     * Resolve the Application Configuration and set the Statamic configuration
     * @param \Illuminate\Foundation\Application $app
     */
    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);

        $configs = [
            'assets', 'cp', 'forms', 'routes', 'static_caching',
            'sites', 'stache', 'system', 'users',
        ];

        foreach ($configs as $config) {
            $app['config']->set("statamic.$config", require(__DIR__ . "/../vendor/statamic/cms/config/{$config}.php"));
        }

        // Setting the user repository to the default flat file system
        $app['config']->set('statamic.users.repository', 'file');

        Statamic::pushCpRoutes(function () {
            return require_once realpath(__DIR__ . '/../routes/cp.php');
        });
    }
}
