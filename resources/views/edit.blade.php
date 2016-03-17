@extends('layouts.master')

@section('content')
    <div class="editable">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h3 class="text-center">{{$headline->headline}}</h3>
                    <hr>
                    <h6 class="text-center">{{$headline->description}}</h6>

                    <div class="text-center">
                        <a data-toggle="modal" data-target="#update-headline" href="#" class="btn btn-warning btn-sm">Update headline</a>
                    </div>
                    <hr>
                    @foreach($articles as $article)
                        <p>{{$article->step_description}}</p>
                        <pre class="prettyprint">
                            <div class="padding-code">{{$article->code}}</div>
                            <button class="btn btn-default btn-xs pull-right copy-button" data-clipboard-text="{{$article->code}}" title="Click to copy me.">Copy</button>
                        </pre>
                        <div class=" pull-right">
                            <a href="" class="btn btn-success" data-toggle="modal" data-target="#update_step{{$article->id}}">Update step</a>
                            <a href="{{URL::to('paste/delete/'.$article->id)}}" class="btn btn-danger delete">Delete step</a>
                        </div>
                        <div class="clearfix"></div><br>
                    @endforeach
                    <div class="text-center"><br>
                        <a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#steps">Add Steps</a><br></div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.modals_updateHeadline')
    @include('layouts.partials.modals_insert')
    @include('layouts.partials.modals_update')
@stop