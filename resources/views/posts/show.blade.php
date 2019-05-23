@extends('layouts.app')

@section('content')

@if (!Auth::guest())
@if ( (Auth::user()->id == $post->user_id) || (Auth::user()->role == 1))
{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit(Lang::get('posts.delete'), ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
<a href="/posts/{{$post->id}}/edit" class="btn  btn-xs" style="background-color:transparent"><img style="width: 2em; height: ;" src="/images/edit.png"></a>


@else 
	@if ($fav == true)
<a href="" class="btn btn-xs btn-like" id="{{$post->id}}" style="background-color:transparent"><img id="heartImg" style="width: 2.5em; height: ;" src="/images/heart.png"></a>
	@else 
<a href="" class="btn btn-xs btn-like" id="{{$post->id}}" style="background-color:transparent"><img id="heartImg" style="width: 2.5em; height: ;" src="/images/heart-empty.png"></a>
	@endif
@endif

@endif
<h1>{{$post->title}}</h1>

<small>@lang('posts.date') {{$post->created_at}}</small>
<small> @lang('posts.by') {{$post->user->name}}</small>

<hr>

<div class="well">
	<div class="row">
		<div class="col-md-4 col-sm-4">
			{{Form::label(Lang::get('posts.address'))}}
			<br>
			{{$post->city}}<br>
			@if ($post->street)
			 @lang('posts.street') {{$post->street}} <br>
			@endif
			@if ($post->house)
			 @lang('posts.house') {{$post->house}} <br>
			@endif
			@if ($post->apartment)
			 @lang('posts.apartment') {{$post->apartment}} <br>
			@endif
			<h2>{{Form::label(Lang::get('posts.price'))}} {{$post->price}} р.</h2>
			<h3>{{Form::label(Lang::get('posts.mobile'))}} {{$post->mobile}}</h3>
			{{Form::label(Lang::get('posts.description'))}}
			{{$post->body}}
		</div>
		<div class="col-md-8 col-sm-12">
			<div class="gallery">

			@if (count($images)>0)
			@foreach ($images as $image)
			<a href="/user_images/{{$image->image}}" data-lightbox="mygallery"><img " src="/user_images/{{$image->image}}" alt=""></a>
			@endforeach

			@else
			<a href="/user_images/noimage.png" data-lightbox="mygallery"><img src="/user_images/noimage.png" alt=""> </a>
			@endif

			</div>
		</div>
		
	</div>


</div>

@endsection