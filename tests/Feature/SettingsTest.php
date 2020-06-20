<?php

namespace Austenc\Socialize\Tests;

use Statamic\Facades\User;

class SettingsTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::make();
        $this->user->id(1)->email('test@example.com')->makeSuper();
        $this->be($this->user);
    }
    public function test_settings_can_be_shown()
    {
        // login as admin

        $response = $this->get(route('statamic.cp.socialize.settings.index'));
        dd($response->getContent());
        $response->assertSuccessful();
    }

    public function test_can_store_settings()
    {
        // Login as CP user / make one
        $user = User::make();
        $user->id(1)->email('test@example.com')->makeSuper();
        $this->be($user);

        $this->post(route('statamic.cp.socialize.settings.store'), [
            'example'
        ]);

        // $this->actingAs()

        // Post to the route
        $this->assertTrue(true);

        // Assert that there is data
    }
}
