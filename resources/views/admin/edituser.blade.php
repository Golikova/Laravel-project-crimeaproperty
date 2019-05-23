@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>@lang('nav.usersControl')</h3></div>

                <div class="panel-body">
                    {!! Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                    
                    <div class="row">
                        <div class="col-lg-3">
                            @lang('admin.name')
                            {{Form::text('name' , $user->name ,['class' => 'form-control', 'placeholder' => Lang::get('admin.name')])}}
                        </div>

                        <div class="col-lg-3">
                            @lang('admin.email')
                            {{Form::text('email' , $user->email,['class' => 'form-control', 'placeholder' => Lang::get('admin.email')])}}
                        </div>

                        <div class="col-lg-3">
                            @lang('admin.password')
                            {{Form::text('password' , $user->password,['class' => 'form-control', 'placeholder' => Lang::get('admin.password')])}}
                        </div>

                        <div class="col-lg-3">
                            @lang('admin.role')
                            {{Form::select('role', array('0' => Lang::get('admin.user'), '1' => Lang::get('admin.admin')), $user->role , ['class' => 'form-control'])}}
                        </div>

                        <div class="col-lg-3">
                            @lang('admin.status')
                            {{Form::select('status', array('' => Lang::get('admin.active'), 'blocked' => Lang::get('admin.blocked')), $user->status , ['class' => 'form-control'])}}
                        </div>

                    </div>
                    
                    
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit(Lang::get('personal.create'), ['class' => 'btn btn-success'])}}
                    {!!Form::close()!!}
                </div>


            </div>
        </div>
    </div>
</div>
@endsection