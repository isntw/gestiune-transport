<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ $title or '' }}</h1>
        </div>
    </div>

    @if(isset($actions))

        @foreach(isset($actions) ? $actions : [] as $a)
            <a class="btn {{ isset($a['class']) ? $a['class'] : 'btn-primary' }}"
               href="{{ $a['href'] }}"> {{ $a['title'] }}</a>
        @endforeach
        <br>
        <br>
    @endif
<!-- Page Content -->
    @if(Route::currentRouteName() != 'dashboard')
        <div class="panel panel-default">
            @yield('content')
        </div>
    @else
        @yield('content')
    @endif
</div>
