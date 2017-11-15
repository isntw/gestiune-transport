@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        {!! Form::open(['url' => '#', 'method' => 'GET']) !!}
        {!! Form::label('Selecteaza luna:') !!}
        {!! Form::text('month', \Carbon\Carbon::now()->format('m-Y'),['class' => 'form-control datetimepicker', 'style' => 'cursor:pointer;']) !!}
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
                
            $('.suma').html(data.total.total_suma);
            $('.km').html(data.total.total_km);
            $('.cheltuieli').html(data.total.total_cheltuieli);
            $("#cheltuieli").empty();

            var donut = new Morris.Donut({
            element: 'cheltuieli',
                    data: data.cheltuieli
            });
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
    $(document).ready(function () {
        
    var donut = new Morris.Donut({
    element: 'cheltuieli',
    });
    
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