@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>@lang('nav.aboutEditing')</h3></div>

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

                @if (count($abouts) > 0)
                <table class="table table-striped">
                    <tr>
                        <th>@lang('admin.title')</th>
                        <th>@lang('admin.body')</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($abouts as $about)
                    <tr>
                        <td>{{$about->title}}</td>
                    </a></td>
                    <td>{!!$about->body!!}</td>
                </a></td>
                <td><a href="/abouts/{{$about->id}}/edit" class="btn btn-default pull-right">@lang('personal.edit')</a></td>
                <td>
                    {!!Form::open(['action' => ['AboutsController@destroy', $about->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit(Lang::get('personal.delete'), ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </td>
            </tr>
            @endforeach
        </table>
        @else
        <p></p>
        @endif


    </div>

</div>
</div>
</div>
</div>
@endsection