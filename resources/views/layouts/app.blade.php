<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Administrare Transport">
        <meta name="author" content="Iustinian Monea">

        <title>Administrare Transport</title>
        {!! Html::style('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css') !!}
        {!! Html::style('/resources/libs/vendors/vendors.min.css') !!}   
        <link href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
      
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                @include('layouts._templates.top-navbar')
                @include('layouts._templates.side-navbar')
            </nav>
            @include('layouts._templates.content')
        </div>
        {!! Html::script('/resources/libs/vendors/vendors.min.js') !!}
        @stack('scripts')
        @include('layouts._templates.notifications')
    </body>
</html>
