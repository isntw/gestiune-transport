@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        {!! Form::open(['url' => '#', 'method' => 'GET']) !!}
        {!! Form::text('month', \Carbon\Carbon::now()->format('m-Y'),['class' => 'form-control datetimepicker']) !!}
        {!! Form::close() !!}
    </div>
</div>
<br>
<div class="row">
    @include('dashboard.components.statistics')
</div>
<div class="row">    
    @include('dashboard.components.grafic_cheltuieli_vanzari')
    @include('dashboard.components.cheltuieli')
</div>

<div class="row">
</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script>
    function updateStats(date) {
    $.ajax({
    url: "{{route('dashboard.statistics')}}",
            data: {month: date},
            method: 'GET',
            success: function (data){
                console.log(data);
            $('.suma').html(data.total_suma);
            },
    });
    }
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
                    "Ian", "Feb", "Mar",
                    "Apr", "Mai", "Iun", "Iul",
                    "Aug", "Sep", "Oct",
                    "Noi", "Dec"
            ];
            return monthNames[x.getMonth()];
            },
            ykeys: ['venituri', 'cheltuieli'],
            labels: ['Venituri/Lei', 'Cheltuieli/Lei'],
    });
    new Morris.Donut({
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
    $(document).ready(function () {
        updateStats(moment().format('MM-YYYY'));
    $('.datetimepicker')
            .datetimepicker({
            format: 'mm-yyyy',
                    startView: 3,
                    minView: 3,
                    maxView: 3,
                    autoclose:true,
            });
    $('.datetimepicker').on('changeDate', function(ev){
    var date = moment(ev.date);
    updateStats(date.format('MM-YYYY'));
    });
    });
</script>
@endpush