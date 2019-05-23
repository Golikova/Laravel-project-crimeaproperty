@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>@lang('nav.usersControl')</h3></div>

                <div class="panel-body">
                    {!!Form::open(['action' => ['UsersController@store'], 'method' => 'POST', 'class' => ''])!!}
                    {{Form::hidden('_method', 'POST')}}
                    
                    <div class="row">
                        <div class="col-lg-3">
                            @lang('admin.name')
                            {{Form::text('name' , '',['class' => 'form-control', 'placeholder' => Lang::get('admin.name')])}}
                        </div>

                        <div class="col-lg-3">
                            @lang('admin.email')
                            {{Form::text('email' , '',['class' => 'form-control', 'placeholder' => Lang::get('admin.email')])}}
                        </div>

                        <div class="col-lg-3">
                            @lang('admin.password')
                            {{Form::text('password' , '',['class' => 'form-control', 'placeholder' => Lang::get('admin.password')])}}
                        </div>

                        <div class="col-lg-3">
                            @lang('admin.role')
                            {{Form::select('role', array('0' => Lang::get('admin.user'), '1' => Lang::get('admin.admin')), '0' , ['class' => 'form-control'])}}
                        </div>


                    </div>
                    
                    
                    
                    {{Form::submit(Lang::get('personal.create'), ['class' => 'btn btn-success'])}}
                    {!!Form::close()!!}
                </div>
                @if (count($users) > 0)
                <table class="table table-striped">
                    <tr>
                        <th>@lang('admin.name')</th>
                        <th>@lang('admin.email')</th>
                        <th>@lang('admin.role')</th>
                        <th>@lang('admin.status')</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($users as $user)
                    <tr>
                        <td><a href="/users/{{$user->id}}">{{$user->name}}</a></td>
                        <td><a href="">{{$user->email}}</a></td>
                        <td>
                            @if ($user->role == 1)
                            @lang('admin.admin')
                            @else
                            @lang('admin.user')
                            @endif
                        </td>
                        <td>
                            @if ($user->status == 'blocked')
                            @lang('admin.blocked')
                            @else
                            @lang('admin.active')
                            @endif
                        </td>

                        <td><a href="/users/{{$user->id}}/edit" class="btn btn-default pull-right">@lang('personal.edit')</a></td>
                        <td>
                            {!!Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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