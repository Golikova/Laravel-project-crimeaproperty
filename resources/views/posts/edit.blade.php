@extends('layouts.app')

@section('content')
<h1>@lang('posts.edit')</h1>
{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
    {{Form::label('title',  Lang::get('posts.title'))}}
    {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' =>  Lang::get('posts.title')])}}
</div>
<hr>

<br />
<div class="row">
 <div class="form-group col-lg-3">
{!! Form::label( Lang::get('posts.type')) !!}
    {!! Form::select('types[]', 
        $types, 
        $post->type_id, 
        ['class' => 'form-control']) !!}
    </div>   
     <div class="form-group col-lg-3">
{!! Form::label( Lang::get('posts.city')) !!}
    {!! Form::select('cities[]', 
        $cities, 
        $post->city_id, 
        ['class' => 'form-control']) !!}
    </div>  
</div>

<div class="form-group">
    <div class="row">
        <div class="col-lg-3">
          {{Form::label( Lang::get('posts.address'))}}
          {{Form::label( Lang::get('posts.street'))}}
          {{Form::text('street', $post->street, ['class' => 'form-control', 'placeholder' =>  Lang::get('posts.street')])}}
          {{Form::label(  Lang::get('posts.house'))}}
          {{Form::text('house', $post->house, ['class' => 'form-control', 'placeholder' =>  Lang::get('posts.house')])}}
          {{Form::label( Lang::get('posts.apartment'))}}
          {{Form::text('apartment', $post->apartment, ['class' => 'form-control', 'placeholder' =>  Lang::get('posts.apartment')])}}
      </div>   
      <div class="col-md-3">
        {{Form::label(  Lang::get('posts.price'))}}
        {{Form::text('price', $post->price, ['class' => 'form-control', 'placeholder' =>  Lang::get('posts.price')])}}
        {{Form::label( Lang::get('posts.mobile'))}}
        {{Form::text('mobile', $post->mobile, ['class' => 'form-control', 'placeholder' =>  Lang::get('posts.mobile')])}}
    </div>
    <div class="col-md-6">

        {{Form::label( Lang::get('posts.photoUpload'))}}
        <div class="form-group">
            <input type="file" name="image[]" multiple="multiple">
        </div>


            @if (count($images)>0)
            <div class="imagePreview">
                @foreach ($images as $image)
            <div class="col-md-2 ">
                <div class="{{$image->id}}" id="HELLO">
                  <img style="width: 100%; " src="/user_images/{{$image->image}}" id="{{$image->id}}"> 
            <button type="button" class="btn btn-xs btn-danger deleteImage" id="{{$image->id}}"> @lang('posts.delete')             
            </button>  
                </div>
            
            </div>
            @endforeach 
            </div>
           

            @endif
        


</div>

</div>
<div class="form-group">
    <hr>
    {{Form::label('description',  Lang::get('posts.description'))}}
    {{Form::textarea('description', $post->body, ['class' => 'form-control', 'placeholder' => 'Описание'])}}
</div>

{{Form::hidden('_method', 'PUT')}}
{{Form::submit( Lang::get('posts.save'), ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection