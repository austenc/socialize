<?php

namespace Austenc\Socialize\Http\Controllers;

use Illuminate\Http\Request;
use Austenc\Socialize\Blueprints\SocialProviderBlueprint;
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

    public function update(Request $request)
    {
        $blueprint = new SocialProviderBlueprint();
        $fields = $blueprint()->fields()->addValues($request->all());
        $fields->validate();
        $values = $fields->process()->values();
        // $tax->update($values->toArray());
    }
}
