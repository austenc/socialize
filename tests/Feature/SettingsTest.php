<?php

namespace Austenc\Socialize\Tests;

use Statamic\Facades\YAML;
use Statamic\Facades\User;
use Statamic\Assets\AssetContainer;

class SettingsTest extends TestCase
{
    use PreventSavingStacheItemsToDisk;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::make();
        $this->user->id(1)->email('test@example.com')->makeSuper();
        $this->be($this->user);
        AssetContainer::make('test')->disk('test')->save();
    }

    public function test_see_settings_form()
    {
        $response = $this->get(cp_route('socialize.settings.index'));
        $response->assertSuccessful();
    }

    public function test_fields_required_when_providers_enabled()
    {
        $response = $this->put(cp_route('socialize.settings.update'), [
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

    public function test_update_twitter_settings()
    {
        $posted = [
            'twitter_enabled' => true,
            'twitter_url' => 'http://example.test',
            'twitter_text' => 'Example twitter text',
            'twitter_hashtags' => '#example #test',
            'twitter_related' => 'test,related,accounts'
        ];
        $response = $this->put(cp_route('socialize.settings.update'), $posted);
        $response->assertSuccessful();
        $this->assertFileExists(config('statamic.socialize.path'));
        $this->assertArraySubset($posted, YAML::file(config('statamic.socialize.path'))->parse());
    }
}
