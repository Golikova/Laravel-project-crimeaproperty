@extends('layouts.app')

@section('content')
<h3>@lang('posts.posts')
	@if ($title)
		: {{$title}}
	@endif
</h3>

@if (count($posts) > 0)
@foreach($posts as $post)
@if ($post->status != 'hidden')
<div class="well">
	<div class="row">
		<div class="col-md-3 col-sm-4">
			@if (!empty($images[$post->id]))
			<a href="/posts/{{$post->id}}">
			<h3><img style="width: 100%;" src="/user_images/{{$images[$post->id]}}" alt=""></h3>
			@else 
			<h3><img style="width: 100%;" src="/user_images/noimage.png" alt=""></h3>
			@endif
		</div>
		<div class="col-md-4 col-sm-4">
			<h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
			@lang('posts.address'):
			<br>
			{{$post->city->name}}<br>
			@if ($post->street)
			@lang('posts.street') {{$post->street}} <br>
			@endif
			@if ($post->house)
			@lang('posts.house') {{$post->house}} <br>
			@endif
			@if ($post->apartment)
			@lang('posts.apartment') {{$post->apartment}} <br>
			@endif
		</a>
		</div>

		<div class="col-md-2 col-sm-4 pull-right">
			<h3 class="pull-right">{{$post->price}}р.</h3>
		</div>
	</div>	
	<small>@lang('posts.date') {{$post->created_at}}</small>
	<small> @lang('posts.by') {{$post->user->name}}</small>

</div>
@endif
@endforeach
{{$posts->links()}}
@else
<p>@lang('posts.empty')</p>
@endif
@endsection