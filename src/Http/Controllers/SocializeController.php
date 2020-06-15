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

        return view('socialize::settings.index', [
            'blueprint' => $blueprint()->toPublishArray(),
            'values'    => $fields->values(),
            'meta'      => $fields->meta(),
        ]);
        // return view('socialize::settings.index', [
        //     'taxes' => collect(),
        //     'columns' => [
        //         Column::make('title')->label('Title Gere'),
        //         Column::make('percentage')->label('Percentage Column'),
        //     ],
        // ]);
    }

    public function store(TaxRateRequest $request): TaxRate
    {
        dd('store plz');
    }
}
