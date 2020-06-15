@extends('statamic::layout')
@section('title', 'Socialize Settings')

@section('content')
    <publish-form
        title="Example Title Component"
        action="{{ cp_route('socialize.settings.store') }}"
        :blueprint='@json($blueprint)'
        :meta='@json($meta)'
        :values='@json($values)'
    ></publish-form>
@endsection