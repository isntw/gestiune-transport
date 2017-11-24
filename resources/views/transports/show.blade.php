@extends('layouts.app')

@section('content')
<div class="panel-heading">Detalii</div>
<div class="panel-body">
    <div class="list-group col-md-offset-3 col-md-6">
        {!! Html::transportDetails('Firma', $transport->company->name,'fa-building')!!}
        {!! Html::transportDetails('Adresa Plecare', $transport->adresa_plecare,'fa-map-marker')!!}
        {!! Html::transportDetails('Adresa Destinatie', $transport->adresa_destinatie,'fa-map-marker')!!}
        {!! Html::transportDetails('Km Parcursi', $transport->km,'fa-road')!!}
        {!! Html::transportDetails('Dislocare Km', $transport->dislocare_km,'fa-truck')!!}
        {!! Html::transportDetails('Data Plecare', $transport->data_plecare->format('d-m-Y'),'fa-calendar')!!}
        {!! Html::transportDetails('Durata Transport', $transport->timp,'fa-clock-o')!!}
        {!! Html::transportDetails('Kg Transport', $transport->kg,'fa-archive')!!}
        {!! Html::transportDetails('Valoare', $transport->suma,'fa-money')!!}
        {!! Html::transportDetailsLabel('Stare', $transport->is_payed ,'fa-cog')!!}
        <br>
        <a href="{{route('transports.edit', $transport->id)}}" class="btn btn-warning btn-block">Editeaza Transport</a>

    </div>
</div>
@endsection
