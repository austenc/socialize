<?php

namespace Austenc\Socialize\Tags;

use Statamic\Facades\YAML;
use Statamic\Tags\Tags;

class Socialize extends Tags
{
    public function index()
    {
        return view('socialize::buttons')->with([
            'layout' => $this->params->get('layout') ?? null,
        ] + $this->settings());
    }

    public function css()
    {
        return '<link rel="stylesheet" href="/vendor/socialize/css/buttons.css">';
    }

    public function boot()
    {
        parent::boot();
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'socialize');
    }

    protected function settings()
    {
        return tap(YAML::file(config('statamic.socialize.path'))->parse() ?? [], function (&$settings) {
            if (! empty($settings['twitter_enabled'])) {
                $settings = $this->twitter($settings);
            }

            if (! empty($settings['facebook_enabled'])) {
                $settings = $this->facebook($settings);
            }

            return $settings;
        });
    }

    protected function facebook($settings)
    {
        $settings['intent_facebook'] = 'https://www.facebook.com/sharer/sharer.php?'.http_build_query([
            'u' => empty(trim($settings['facebook_url'])) ? url()->current() : $settings['facebook_url'],
        ]);

        return $settings;
    }

    protected function twitter($settings)
    {
        // strip spaces from hashtags and related usernames
        $settings['twitter_hashtags'] = preg_replace("/\s+/", '', $settings['twitter_hashtags'] ?? '');
        $settings['twitter_related'] = preg_replace("/\s+/", '', $settings['twitter_related'] ?? '');

        // build URL query string
        $settings['intent_twitter'] = 'https://twitter.com/intent/tweet/?'.http_build_query([
            'url' => empty(trim($settings['twitter_url'])) ? url()->current() : $settings['twitter_url'],
            'text' => $settings['twitter_text'] ?? '',
            'hashtags' => $settings['twitter_hashtags'] ?? '',
            'related' => $settings['twitter_related'] ?? '',
        ]);

        return $settings;
    }
}
