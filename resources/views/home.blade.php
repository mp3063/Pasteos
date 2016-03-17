@extends('layouts.master')

@section('content')
    @include('layouts.partials.modals_insert')
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Pasteos</h1>
            <hr>
            <h4>
                With PASTEOS you can describe a particular programming process in small steps to help you remember it for future SELF and others... Just create your account on PASTEOS and start saving something, cause you might forget that in future!!!
            </h4>
            {{--<h5>--}}
                {{--Just copy and paste steps you find on internet from different resources, describe it, and make shure that these steps work on your computer to complete certain process, no matter how small or big is! <p>Or learn from others!!!</p>--}}
            {{--</h5>--}}
            <hr>
            @if(Auth::check())
            <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#headline">Create new Pasteos</a>
        @else
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <div class="btn-group-justified">
                            <a href="/auth/register/" class="btn btn-primary btn-lg">Register</a>
                            <a href="/auth/login/" class="btn btn-success btn-lg">Login</a>
                        </div>
                    </div>
                </div>

            @endif
        </div>
        <div class="text-center">
            <h4>Sign up to redeem your $10 referral credit!</h4>
            <a target="_blank" href="https://www.digitalocean.com/?refcode=fbd945c03c5b">
                <img src="/img/banner-ads/ssd-virtual-servers-banner-2-728x90.jpg" alt="banner">
            </a>
        </div>

    </div>

@stop
