@extends('layouts.master')

@section('content')
    <div class="container">
        <div>
            <div class="text-center">
                @if(Auth::check())
                    <h3>{{Auth::user()->username}}</h3>
                @endif

            <form action="/search-mypasteos/" class="form-inline">
                {{csrf_field()}}
                <input class="form-control" type="text" name="search-mypasteos" placeholder="Search MyPasteos">
                <button type="submit" class="btn btn-default">Search</button>
            </form>
            </div>
        </div>
        <hr>

        @if($headlines->isEmpty())
            <div class="text-center">
                <h4>Sorry, there is no such record!</h4>
            </div>
        @else
            @foreach($headlines as $headline)
                <a href="{{URL::to('paste/delete-headline/'.$headline->id)}}" class="btn btn-danger btn-sm pull-right delete">Delete</a>
                <a href="/pasteos/{{$headline->slug}}">{{$headline->headline}}</a><br>
                <p>{{$headline->description}}</p>
                <hr>
            @endforeach
        @endif
    </div>
@stop
