@extends('statamic::layout')
@section('title', 'Socialize Settings')

@section('content')
    <publish-form
        title="Socialize Settings"
        action="{{ cp_route('socialize.settings.update') }}"
        :blueprint='@json($blueprint)'
        :meta='@json($meta)'
        :values='@json($values)'
    ></publish-form>
@endsection