@extends('layouts.app')

@section('content')
<div class="container">
	
	<div class="well">
		@foreach ($abouts as $about)
		<h1 class="text-center"> {{$about->title}} </h1>

		<p class="text-center">{!!$about->body!!}</p>

		@endforeach
		<h2 class="text-center"> @lang('personal.map') </h2>
		<div class="row">

			<div class="">
				<span class="border">
					<iframe style="display:block;  width: 61.250em;
					height: 25.000em;
					margin: 0 auto;
					background-color: #777;" src="https://yandex.ru/map-widget/v1/?um=constructor%3A657c6dbbc01002362c0bc55f99af0c0ebc102209afa4a1e287913519a8e01e9c&amp;source=constructor" width="61.250em" height="25.000em" frameborder="0"></iframe>
				</span>
				
			</div>
		</div>
		
		



		<h2 class="text-center"> @lang('personal.contact')</h2>
		<p class="text-center">+79787174844</p>
		<p class="text-center">guexaa@gmail.com</p>
		<p class="text-center">VK</p>
		<p class="text-center"><a href="https://vk.com/avokilog">vk.com/avokilog</a></p>
		<p class="text-center">Instagram</p>
		<p class="text-center"><a href="https://instagram.com/avokilog">instagram.com/avokilog</a></p>

	</div>
</div>


@endsection('')
