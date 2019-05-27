@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>@lang('personal.myAdverts')</h3></div>

                <div class="panel-body">

                    <a href="/posts/create" class="btn btn-primary">@lang('personal.create')</a>
                </div>
                @if (count($posts) > 0)
        <table class="table table-striped">
            <tr>
                <th>@lang('personal.title')</th>
                <th>@lang('posts.status')</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($posts as $post)
            <tr>
                <td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>
                <td>@lang('posts.'.$post->status)</td>
                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default pull-right">@lang('personal.edit')</a></td>
                <td>
                    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit(Lang::get('personal.delete'), ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
                </td>
            </tr>
            @endforeach
        </table>
                @else
                <p>@lang('personal.empty')</p>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
