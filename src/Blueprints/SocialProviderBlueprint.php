<?php

namespace Austenc\Socialize\Blueprints;

use Statamic\Facades\Blueprint;

class SocialProviderBlueprint
{
    public function __invoke()
    {
        return Blueprint::make()->setContents([
            'sections' => [
                'Twitter' => [
                    'fields' => [
                        [
                            'handle' => 'twitter_enabled',
                            'field' => [
                                'display' => 'Button Enabled',
                                'type' => 'toggle',
                                'width' => '25'
                            ]
                        ],
                        [
                            'handle' => 'twitter_message',
                            'field'  => [
                                'type'     => 'text',
                                'width'    => '75',
                                'display'  => 'Default message / hashtags in the sharing popup',
                                'validate' => 'required',
                            ],
                        ],
                    ],
                ],
                'Instagram' => [
                    'fields' => [
                        [
                            'handle' => 'instagram_enabled',
                            'field' => [
                                'display' => 'Button Enabled',
                                'type' => 'toggle',
                                'width' => '25'
                            ]
                        ],
                    ]
                ],
                'Facebook' => [
                    'fields' => [
                        [
                            'handle' => 'facebook_enabled',
                            'field' => [
                                'display' => 'Button Enabled',
                                'type' => 'toggle',
                                'width' => '25'
                            ]
                        ],
                    ]
                ],
                'Pinterest' => [
                    'fields' => [
                        [
                            'handle' => 'pinterest_enabled',
                            'field' => [
                                'display' => 'Button Enabled',
                                'type' => 'toggle',
                                'width' => '25'
                            ]
                        ],
                    ]
                ],
                'Email' => [
                    'fields' => [
                        [
                            'handle' => 'email_enabled',
                            'field' => [
                                'display' => 'Button Enabled',
                                'type' => 'toggle',
                                'width' => '25'
                            ]
                        ],
                    ]
                ],
            ],
        ]);
    }
}
