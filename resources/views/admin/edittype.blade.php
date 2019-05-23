@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>@lang('admin.types')</h3></div>

            <div class="panel-body">
                    {!!Form::open(['action' => ['AboutsController@store'], 'method' => 'POST', 'class' => ''])!!}
                    {{Form::hidden('_method', 'POST')}}
                    
                    <div class="row">
                        <div class="col-lg-3">
                            @lang('admin.title')
                            {{Form::text('title' , '',['class' => 'form-control', 'placeholder' => Lang::get('admin.title')])}}
                        </div>

                    </div>

                    <div class="row">
                       <div class="col-lg-12">
                        @lang('admin.body')
                        {{Form::textarea('body' , '',['id' => 'article-ckeditor' ,'class' => 'form-control', 'placeholder' => Lang::get('admin.body')])}}
                        {{Form::submit(Lang::get('personal.create'), ['class' => 'btn btn-success'])}}
                                {!!Form::close()!!}
                    </div>

                </div>



            </div>
        </div>
    </div>
</div>
@endsection