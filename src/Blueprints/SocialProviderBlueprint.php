<?php

namespace Austenc\Socialize\Blueprints;

use Statamic\Facades\Blueprint;

class SocialProviderBlueprint
{
    public function __invoke()
    {
        return Blueprint::make()->setContents([
            'sections' => [
                'main'    => [
                    'fields' => [
                        [
                            'handle' => 'label',
                            'field' => [
                                'type' => 'section',
                                'display' => 'Twitter',
                                'instructions' => 'Settings for the Twitter sharing button'
                            ]
                        ],
                        [
                            'handle' => 'enabled',
                            'field' => [
                                'type' => 'toggle',
                                'width' => '25'
                            ]
                        ],
                        [
                            'handle' => 'message',
                            'field'  => [
                                'type'     => 'text',
                                'width'    => '75',
                                'display'  => 'Sharing message',
                                'validate' => 'required',
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
