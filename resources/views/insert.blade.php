@extends('layouts.master')

@section('content')
    <div class="editable">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="text-center"><br>
                        <a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#steps">Add Steps</a><br></div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.modals_insert')
@stop
