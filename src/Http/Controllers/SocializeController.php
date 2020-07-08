<?php

namespace Austenc\Socialize\Http\Controllers;

use Illuminate\Http\Request;
use Austenc\Socialize\Blueprints\SocialProviderBlueprint;
use Statamic\Http\Controllers\CP\CpController;
use Statamic\Facades\File;
use Statamic\Facades\YAML;

class SocializeController extends CpController
{
    protected $path;

    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->path = base_path('content/addons/socialize.yaml');
    }

    public function index()
    {
        $blueprint = new SocialProviderBlueprint();
        $fields = $blueprint()->fields()->preProcess();
        $values = file_exists($this->path) ? YAML::file($this->path)->parse() : $fields->values();

        return view('socialize::cp.settings.index', [
            'blueprint' => $blueprint()->toPublishArray(),
            'values'    => $values,
            'meta'      => $fields->meta(),
        ]);
    }

    public function update(Request $request)
    {
        $blueprint = new SocialProviderBlueprint();
        $fields = $blueprint()->fields()->addValues($request->all());
        $fields->validate();
        File::put($this->path, YAML::dump($fields->process()->values()->all()));
    }
}
