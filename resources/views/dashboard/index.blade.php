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
                        <div class="huge">{{is_null($transportsInfo->suma) ? 0 : $transportsInfo->suma }}</div>
                        <div><b>LEI</b></div>
                    </div>
                </div>
            </div>
            <a href="{{route('transports.index')}}">
                <div class="panel-footer">
                    <span class="pull-left">Venituri {{\Carbon\Carbon::now()->format('F')}}</span>
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
                        <i class="fa fa-credit-card fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ $costInfo['Total'] != 0 ? $costInfo['Total'] : 0  }}</div>
                        <div><b>LEI</b></div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Cheltuieli {{\Carbon\Carbon::now()->format('F')}}</span>
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
                        <div><b>KM</b></div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Km parcursi {{\Carbon\Carbon::now()->format('F')}}</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">13</div>
                        <div>Support Tickets!</div>
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
                <i class="fa fa-bar-chart-o fa-fw"></i> Cheltuieli Ultima Luna
            </div>
            <div class="panel-body">
                <div id="cheltuieli" style="height: 250px;"></div>
                <a href="{{route('costs.index')}}" class="btn btn-default btn-block">Vezi Detalii</a>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Incasari / Cheltuieli
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
        {
        month: '{{$result}}', venituri:{{$value['venituri']}}, cheltuieli:{{$value['cheltuieli']}}},
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
        labels: ['Venituri/Lei', 'cheltuieli'],
});
Morris.Donut({
element: 'cheltuieli',
        data: [
        {!!  $costInfo['Motorina'] != 0 ? '{label: "Motorina", value: '.$costInfo['Motorina'].'},': ''!!}
        {!!  $costInfo['Consumabile'] != 0 ? '{label: "Consumabile", value: '.$costInfo['Consumabile'].'},': ''!!}
        {!!  $costInfo['Piese'] != 0 ? '{label: "Piese", value: '.$costInfo['Piese'].'},': ''!!}
        {!!  $costInfo['Manopera'] != 0 ? '{label: "Manopera", value: '.$costInfo['Manopera'].'},': ''!!}
        {!!  $costInfo['TAXE'] != 0 ? '{label: "TAXE", value: '.$costInfo['TAXE'].'},': ''!!}
        {!!  $costInfo['Altele'] != 0 ? '{label: "Altele", value: '.$costInfo['Altele'].'},': ''!!}
        ]
});

</script>
@endpush
@endsection