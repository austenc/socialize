<?php

namespace Austenc\Socialize\Tests;

use Statamic\Assets\AssetContainer;
use Statamic\Facades\User;
use Statamic\Facades\YAML;

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

    public function test_email_fields_required_when_email_enabled()
    {
        $response = $this->put(cp_route('socialize.settings.update'), [
            'email_enabled' => true,
        ]);

        $response->assertSessionHasErrors([
            'email_subject',
            'email_text',
        ]);
    }

    public function test_update_twitter_settings()
    {
        $this->assertSettingsSavedToFile([
            'twitter_enabled' => true,
            'twitter_url' => 'http://twitter-example.test',
            'twitter_text' => 'Example twitter text',
            'twitter_hashtags' => '#example #test',
            'twitter_related' => 'test,related,accounts',
        ]);
    }

    public function test_twitter_url_not_required_when_button_enabled()
    {
        $this->assertSettingsSavedToFile([
            'twitter_enabled' => true,
            'twitter_url' => '',
            'twitter_text' => 'Example twitter text',
            'twitter_hashtags' => '#example #test',
            'twitter_related' => 'test,related,accounts',
        ]);
    }

    public function test_update_facebook_settings()
    {
        $this->assertSettingsSavedToFile([
            'facebook_enabled' => true,
            'facebook_url' => 'http://fb-example.test',
        ]);
    }

    // public function test_update_pinterest_settings()
    // {
    //     $this->assertSettingsSavedToFile([
    //         'pinterest_enabled' => true,
    //         'pinterest_url' => 'http://pinterest-example.test',
    //     ]);
    // }

    public function test_update_email_settings()
    {
        $this->assertSettingsSavedToFile([
            'email_enabled' => true,
            'email_subject' => 'Example Subject',
            'email_text' => 'Testing an example email text',
        ]);
    }

    protected function assertSettingsSavedToFile($settings)
    {
        $response = $this->put(cp_route('socialize.settings.update'), $settings);
        $response->assertSuccessful();
        $this->assertFileExists(config('statamic.socialize.path'));
        $this->assertArraySubset($settings, YAML::file(config('statamic.socialize.path'))->parse());
    }
}
