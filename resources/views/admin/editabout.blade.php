@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>@lang('nav.aboutEditing')</h3></div>

                <div class="panel-body">
                    {!! Form::open(['action' => ['AboutsController@update', $about->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                    
                                        <div class="row">
                        <div class="col-lg-3">
                            @lang('admin.title')
                            {{Form::text('title' , $about->title,['class' => 'form-control', 'placeholder' => Lang::get('admin.title')])}}
                        </div>

                    </div>

                    <div class="row">
                       <div class="col-lg-12">
                        @lang('admin.body')
                        {{Form::textarea('body' , $about->body,['id' => 'article-ckeditor' ,'class' => 'form-control', 'placeholder' => Lang::get('admin.body')])}}
                       
                    </div>
                    
                    
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit(Lang::get('admin.save'), ['class' => 'btn btn-success'])}}
                    {!!Form::close()!!}
                </div>


            </div>
        </div>
    </div>
</div>
@endsection