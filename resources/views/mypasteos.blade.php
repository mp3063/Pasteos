@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="text-center">
            @if(Auth::check())
                <h3>{{Auth::user()->username}}</h3>
            @endif
        </div>
        @if(isset($headline))
            <div class="text-center">
                <form action="/search-mypasteos/" class="form-inline">
                    {{csrf_field()}}
                    <input class="form-control" type="text" name="search-mypasteos" placeholder="Search MyPasteos">
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
            </div>
            <hr>
            @foreach($headline as $head)
                <a href="{{URL::to('paste/delete-headline/'.$head->id)}}" class="btn btn-danger btn-sm pull-right delete">Delete</a>
                <a href="/pasteos/{{$head->slug}}">{{$head->headline}}</a><br>
                <p>{{$head->description}}</p>
                <div class="clearfix"></div>
                <hr>
            @endforeach
        <div class="text-center">{!! $headline->render()!!}</div>

        @endif
    </div>
@stop
