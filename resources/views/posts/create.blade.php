@extends('layouts.app')

@section('content')
<h1>@lang('posts.create')</h1>
{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}


{{Form::text('title', '', ['class' => 'form-control', 'placeholder' => Lang::get('posts.title')])}}        


<hr>
<br />
<div class="row">
 <div class="form-group col-lg-3">
{!! Form::label(Lang::get('posts.type')) !!}
    {!! Form::select('types[]', 
        $types, 
        null, 
        ['class' => 'form-control']) !!}
    </div>   
<div class="form-group col-lg-3">
    {!! Form::label(Lang::get('posts.city')) !!}
     {!! Form::select('cities[]', 
        $cities, 
        null, 
        ['class' => 'form-control']) !!}
    </div>
</div>


    <div class="form-group">

            <div class="row">


            <div class="col-lg-3">
                {!! Form::label(Lang::get('posts.address')) !!}
                   


                {{Form::text('street', '', ['class' => 'form-control', 'placeholder' => Lang::get('posts.street')])}}


                {{Form::text('house', '', ['class' => 'form-control', 'placeholder' => Lang::get('posts.house')])}}


                {{Form::text('apartment', '', ['class' => 'form-control', 'placeholder' => Lang::get('posts.apartment')])}}
            </div>    
            <div class="col-lg-3"> 
                {{Form::label(Lang::get('posts.price'))}}
                {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => Lang::get('posts.price')])}}
                {{Form::label(Lang::get('posts.mobile'))}}
                {{Form::text('mobile', '', ['class' => 'form-control', 'placeholder' => Lang::get('posts.mobile')])}}
            </div>
            <div class="col-lg-5">
                {{Form::label(Lang::get('posts.photoUpload'))}}
                <div class="form-group">
                    <input type="file" name="image[]" multiple="multiple">
                </div> 
            </div>
        </div>




    <div class="form-group">
        <hr>
        {{Form::label('description', Lang::get('posts.description'))}}
        {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => Lang::get('posts.description')])}}
    </div>
    

    {{Form::submit(Lang::get('posts.save'), ['class'=>'btn btn-primary'])}}
    <hr>
    {!! Form::close() !!}

    @endsection