@extends('layouts.admin')

@section('content')
    <div class="jumbotron text-center">
        <h3>@lang('index.admin')</h3>
       <div class="row">
           <a class="btn btn-success" href="/users" role="button">@lang('nav.usersControl')</a></p>
       </div>
        <div class="row">
           <a class="btn btn-success" href="/aboutEditing" role="button">@lang('nav.aboutEditing')</a></p>
       </div>
        <div class="row">
           <a class="btn btn-success" href="/cities" role="button">@lang('nav.cities')</a></p>
       </div>
        <div class="row">
           <a class="btn btn-success" href="/types" role="button">@lang('nav.categories')</a></p>
       </div>
        <div class="row">
           <a class="btn btn-success" href="/posts" role="button">@lang('nav.posts')</a></p>
       </div>
		
		
    </div>
@endsection