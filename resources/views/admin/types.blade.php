@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>@lang('nav.usersControl')</h3></div>

                <div class="panel-body">
                    {!!Form::open(['action' => ['TypesController@store'], 'method' => 'POST', 'class' => ''])!!}
                    {{Form::hidden('_method', 'POST')}}
                    
                    <div class="row">
                        <div class="col-lg-3">
                            @lang('admin.type')
                            {{Form::text('name' , '',['class' => 'form-control', 'placeholder' => Lang::get('admin.type')])}}
                        </div>

                    </div>
                
                    {{Form::submit(Lang::get('personal.create'), ['class' => 'btn btn-success'])}}
                    {!!Form::close()!!}
                </div>
                @if (count($types) > 0)
                <table class="table table-striped">
                    <tr>
                        <th>@lang('admin.type')</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($types as $type)
                    <tr>
                        <td><a href="/types/{{$type->id}}">{{$type->name}}</a></td>
                        
                        <td><a href="/types/{{$type->id}}/edit" class="btn btn-default pull-right">@lang('personal.edit')</a></td>
                        <td>
                            {!!Form::open(['action' => ['TypesController@destroy', $type->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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
@endsection