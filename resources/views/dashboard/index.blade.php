@extends('layouts.app')

@section('content')
<div class="row">
    @include('dashboard.components.statistics')
</div>
<div class="row">
    @include('dashboard.components.cheltuieli')
</div>

<div class="row">
    @include('dashboard.components.grafic_cheltuieli_vanzari')
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