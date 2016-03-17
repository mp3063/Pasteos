@extends('layouts.master')

@section('content')
    <div class="container">
        @if($headline->isEmpty())
            <div class="text-center">
                <h4>Sorry, there is no such record!</h4>
            </div>
        @else
            @foreach($headline as $head)
                @if(Auth::id() == $head->user_id)
                    <a href="{{URL::to('paste/delete-headline/'.$head->id)}}" class="btn btn-danger btn-sm pull-right delete">Delete</a>
                    <a href="/pasteos/{{$head->slug}}">{{$head->headline}}</a><br>
                @else
                    <a href="/read-only/{{$head->slug}}">{{$head->headline}}</a><br>
                @endif
                <p>{{$head->description}}</p>
                <small>by {{$head->user->username}}</small><br>
                <hr>
            @endforeach
        @endif
    </div>
@stop
