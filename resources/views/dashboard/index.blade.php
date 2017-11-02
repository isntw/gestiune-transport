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
                        <div class="huge">{{is_null($transportsInfo->incasare) ? 0: $transportsInfo->incasare}}</div>
                        <div>Venituri luna {{\Carbon\Carbon::now()->format('m')}}</div>
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
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ '0' }}</div>
                        <div>Cheltuieli luna {{\Carbon\Carbon::now()->format('m')}}</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-road fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{is_null($transportsInfo->km) ? 0 : $transportsInfo->km }}</div>
                        <div>Km parcursi luna {{\Carbon\Carbon::now()->format('m')}}</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-lg-4">

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Incasari/Luna
            </div>
<div id="cheltuieli" style="height: 250px;"></div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Incasari/Luna
            </div>
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
element: 'incasari',
        data: [
                @foreach ($results as $result => $value)
        {month: '{{$result}}',  venituri:{{$value['venituri']}}, cheltuieli:{{$value['cheltuieli']}}},
                @endforeach
        ],
        xkey: 'month',
        xLabelFormat: function (x) {
        var monthNames = [
                "Ianuarie", "Februarie", "Martie",
                "Aprilie", "Mai", "Iunie", "Iulie",
                "August", "Septembrie", "Octombrie",
                "Noiembrie", "Decembrie"
        ];
        return monthNames[x.getMonth()];
        },
        ykeys: ['venituri', 'cheltuieli'],
        labels: ['Venituri/Lei' , 'cheltuieli'],
});

Morris.Donut({
  element: 'cheltuieli',
  data: [
    {label: "Download Sales", value: 200},
    {label: "In-Store Sales", value: 325},
    {label: "Mail-Order Sales", value: 70}
  ]
});

</script>
@endpush
@endsection