<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/pasteos_template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- InstanceBeginEditable name="doctitle" -->
    <meta name="google-site-verification" content="bAV5mP2hiN4Zk2PVzjZddetCZazoX-QgQA7AH9oUmDM" />
    <meta name="description"
          content="With PASTEOS you can describe certain process in a small steps to help you remember it...">
    <meta name="keywords"
          content="pasteos, snippets, laravel, php, programming, remember">
    <meta name="author" content="Srdjan Sin Jovanovic">
    <title>Pasteos | Describe and save particular programming process</title>
    <!-- InstanceEndEditable -->
    <!-- Bootstrap -->
    {{--<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?lang=css&amp;skin=sunburst"></script>--}}
    <link href="{{URL::asset('assets/css/app.min.css')}}" rel="stylesheet">
    {{--<link href="/css/theme.min.css" rel="stylesheet">--}}
    {{--<link href="/css/custom.css" rel="stylesheet" type="text/css">--}}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->
</head>
<body style="padding-top: 70px">
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-W262H4"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-W262H4');</script>
<!-- End Google Tag Manager -->
@include('layouts.partials.modals_insert')
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Pasteos</a></div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="topFixedNavbar1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home
                        <span class="sr-only">(current)</span>
                    </a></li>
                @if(Auth::check())
                    <li><a href="/pasteos">My Pasteos</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#headline">Create new</a></li>
                @endif
            </ul>

            <form action="{{URL::route('searchHeadlines')}}" method="get" class="navbar-form navbar-left" role="search">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" class="form-control search" name="search" placeholder="Global Search">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
                <a href="/search" class="btn btn-default">Show all from Pasteos</a>
            </form>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li><a href="#">{{Auth::user()->username}}</a></li>
                    <li><a href="/auth/logout">Logout</a></li>
                @else
                    <li><a href="/auth/login">Login</a></li>
                    <li><a href="/auth/register">Register</a></li>
                @endif
            </ul>
        </div>

        <!-- /.navbar-collapse -->
    </div>

    <!-- /.container-fluid -->
</nav>
@if (count($errors) > 0)
    <div class="alert alert-danger text-center">
        There were some problems with your input.<br><br>
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    </div>
    @endif
            <!-- InstanceBeginEditable name="EditRegion1" -->

    @include('layouts.partials.flash')

    @yield('content')
            <!-- InstanceEndEditable --><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    {{--<script src="/js/zeroClipboard/ZeroClipboard.min.js"></script>--}}
    <script src="{{URL::asset('assets/js/app.min.js')}}"></script>
    {{--<script>--}}
    {{--swal({title: "Error!", text: "Here's my error message!", type: "error", confirmButtonText: "Cool"});--}}
    {{--</script>--}}
    {{--<script src="/js/jquery.js"></script>--}}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{--<script src="/js/bootstrap.min.js"></script>--}}
    {{--<script src="/js/main.js"></script>--}}
</body>
                <!-- InstanceEnd -->
</html>

