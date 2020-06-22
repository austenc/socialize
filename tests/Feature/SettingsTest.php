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

    public function test_see_settings_form()
    {
        $response = $this->get(route('statamic.cp.socialize.settings.index'));
        $response->assertSuccessful();
    }

    public function test_can_store_settings()
    {
        $response = $this->put(route('statamic.cp.socialize.settings.update'), [
            'example' => 'nothin'
        ]);

        $response->assertSuccessful();
        $response->assertSessionHasNoErrors();


        $this->assertTrue(true);

        // Assert that there is data
    }
}
