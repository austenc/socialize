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

    public function test_fields_required_when_providers_enabled()
    {
        $response = $this->put(route('statamic.cp.socialize.settings.update'), [
            'twitter_enabled' => true,
            'facebook_enabled' => true,
            // 'pinterest_enabled' => true,
            'email_enabled' => true
        ]);

        $response->assertSessionHasErrors([
            'twitter_url',
            'facebook_url',
            // 'pinterest_url',
            // 'pinterest_image',
            'email_subject',
            'email_text'
        ]);
    }
}
