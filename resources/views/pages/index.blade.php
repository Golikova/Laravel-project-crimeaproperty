@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>@lang('index.appName')</h1>
        <p>@lang('index.tagline')</p>
        @if (Auth::guest())
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">@lang('index.login')</a> 
        <a class="btn btn-success btn-lg" href="/register" role="button">@lang('index.signup')</a></p>
        @else
		<a class="btn btn-success btn-lg" href="/posts" role="button">@lang('index.posts')</a></p>
		@endif
    </div>
@endsection