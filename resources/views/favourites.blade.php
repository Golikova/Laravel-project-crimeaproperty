@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>@lang('personal.favourites')</h3></div>

                @if (count($posts) > 0)
        <table class="table table-striped" style="">
            <tr>
                <th>@lang('personal.title')</th>
                <th>@lang('personal.date')</th>
                <th>@lang('personal.user')</th>
                <th>@lang('personal.price')</th>
            </tr>
            @foreach ($posts as $post)
            <tr>
                <td><a href="/posts/{{$post->id}}">{{$post->title}} </a></td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->user->name}}</td>
				<td>{{$post->price}}р.</td>
            </tr>
            @endforeach
        </table>
                @else
                <p>@lang('personal.empty')(</p>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
