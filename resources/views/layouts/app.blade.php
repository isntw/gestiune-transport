<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Administrare Transport">
        <meta name="author" content="Iustinian Monea">

        <title>Administrare Transport</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ URL::asset('resources/theme/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{ URL::asset('resources/theme/css/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ URL::asset('https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" >
        <link href="{{ URL::asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}" rel="stylesheet" >
        <link href="{{ URL::asset('css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" >
        <link href="{{ URL::asset('resources/theme/css/startmin.css')}}" rel="stylesheet">



        <!-- Custom Fonts -->
        <link href="{{ URL::asset('resources/theme/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                @include('layouts._templates.top-navbar')
                @include('layouts._templates.side-navbar')
            </nav>

            @include('layouts._templates.content')

        </div>
        <!-- jQuery -->
        <script src="{{ URL::asset('resources/theme/js/jquery.min.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ URL::asset('resources/theme/js/bootstrap.min.js')}}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ URL::asset('resources/theme/js/metisMenu.min.js')}}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{ URL::asset('resources/theme/js/startmin.js')}}"></script>
        @stack('scripts')

    </body>
</html>
