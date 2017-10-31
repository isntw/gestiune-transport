@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$transport->count()}}</div>
                        <div>Curse/Luna</div>
                    </div>
                </div>
            </div>
            <a href="{{route('transports.index')}}">
                <div class="panel-footer">
                    <span class="pull-left">Detalii</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="panel panel-default">

    <div class="panel-body">

        <div class="col-md-12">
            <div id="incasari" style="height: 250px;"></div>
        </div>
    </div>
</div>

@push('scripts')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
new Morris.Line({
// ID of the element in which to draw the chart.
    element: 'incasari',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [
        {year: '2008', value: 20},
        {year: '2009', value: 10},
        {year: '2010', value: 35},
        {year: '2011', value: 5},
        {year: '2012', value: 20},
        {year: '2013', value: 7},
        {year: '2014', value: 19},
        {year: '2015', value: 55}


    ],
    // The name of the data record attribute that contains x-values.
    xkey: 'year',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['value'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Value']
});
</script>
@endpush
@endsection