@extends('layouts.master')

@section('content')
    <div class="editable">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h3 class="text-center">{{$headline->headline}}</h3>
                    <hr>
                    <h6 class="text-center">{{$headline->description}}</h6>
                    <hr>
                    @foreach($articles as $article)
                        <p>{{$article->step_description}}</p>
                        <pre class="prettyprint"><div class="padding-code">{{$article->code}}</div><button class="btn btn-default btn-xs pull-right copy-button" data-clipboard-text="{{$article->code}}" title="Click to copy me.">Copy</button></pre>
                        <div class="clearfix"></div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop

