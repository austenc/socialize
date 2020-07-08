<?php

namespace Austenc\Socialize\Tests;

use Statamic\Facades\User;
use Illuminate\Support\Facades\Storage;
use Statamic\Assets\AssetContainer;

class SettingsTest extends TestCase
{
    // use PreventSavingStacheItemsToDisk;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::make();
        $this->user->id(1)->email('test@example.com')->makeSuper();
        $this->be($this->user);

        // tap(Storage::fake('test'))->getDriver()->getConfig()->set('url', '/assets');
        // AssetContainer::make('test')->disk('test')->save();
        // Storage::fake('dimensions-cache');
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
            'email_enabled' => true,
            'pinterest_enabled' => true,
        ]);

        $response->assertSessionHasErrors([
            'twitter_url',
            'facebook_url',
            'email_subject',
            'email_text',
            'pinterest_url',
            // 'pinterest_image',
        ]);
    }
}
