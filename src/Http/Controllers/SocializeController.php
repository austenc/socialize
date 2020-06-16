<?php

namespace Austenc\Socialize\Http\Controllers;

use Austenc\Socialize\Blueprints\SocialProviderBlueprint;
use Statamic\CP\Column;
use Statamic\Http\Controllers\CP\CpController;

class SocializeController extends CpController
{
    public function index()
    {
        $blueprint = new SocialProviderBlueprint();
        $fields = $blueprint()->fields()->preProcess();

        return view('socialize::cp.settings.index', [
            'blueprint' => $blueprint()->toPublishArray(),
            'values'    => $fields->values(),
            'meta'      => $fields->meta(),
        ]);
    }

    public function store()
    {
    }
}
