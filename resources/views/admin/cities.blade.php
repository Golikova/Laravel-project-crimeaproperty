@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>@lang('nav.usersControl')</h3></div>

                <div class="panel-body">
                    {!!Form::open(['action' => ['CitiesController@store'], 'method' => 'POST', 'class' => ''])!!}
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
                @if (count($cities) > 0)
                <table class="table table-striped">
                    <tr>
                        <th>@lang('admin.type')</th>
                        
                        <th></th>
                    </tr>
                    @foreach ($cities as $city)
                    <tr>
                        <td><a href="/cities/{{$city->id}}">{{$city->name}}</a></td>
                        </a></td>
                        <td>
                            {!!Form::open(['action' => ['CitiesController@destroy', $city->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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