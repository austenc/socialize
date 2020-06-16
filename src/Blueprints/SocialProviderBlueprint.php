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
                            'handle' => 'twitter_url',
                            'field'  => [
                                'type' => 'text',
                                'width' => '75',
                                'display' => 'URL',
                                'instructions'  => 'URL included with the tweet. Leave blank to use current page URL',
                                // 'validate' => 'required',
                            ],
                        ],
                        [
                            'handle' => 'twitter_text',
                            'field'  => [
                                'type' => 'textarea',
                                'display' => 'Text',
                                'instructions'  => 'Pre-populated text highlighted in the tweet composer',
                            ],
                        ],
                        [
                            'handle' => 'twitter_hashtags',
                            'field'  => [
                                'type' => 'text',
                                'display' => 'Hashtags',
                                'instructions'  => 'A comma-separated list of hashtags to be appended to default tweet text',
                            ],
                        ],
                        [
                            'handle' => 'twitter_related',
                            'field'  => [
                                'type' => 'text',
                                'display' => 'Related Accounts',
                                'instructions'  => 'A comma-separated list of accounts related to the content of the shared URI',
                                // 'validate' => 'required',
                            ],
                        ],
                    ],
                ],
                // 'Instagram' => [
                //     'fields' => [
                //         [
                //             'handle' => 'instagram_enabled',
                //             'field' => [
                //                 'display' => 'Button Enabled',
                //                 'type' => 'toggle',
                //                 'width' => '25'
                //             ]
                //         ],
                //     ]
                // ],
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
                        [
                            'handle' => 'email_subject',
                            'field'  => [
                                'type' => 'text',
                                'display' => 'Subject',
                                'width' => '75',
                                'instructions'  => 'The default subject line of the email',
                                // 'validate' => 'required',
                            ],
                        ],
                        [
                            'handle' => 'email_text',
                            'field'  => [
                                'type' => 'textarea',
                                'display' => 'Body',
                                'instructions'  => 'Text contents of the email',
                                // 'validate' => 'required',
                            ],
                        ],
                    ]
                ],
            ],
        ]);
    }
}
