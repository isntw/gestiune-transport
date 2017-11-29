@extends('layouts.app')

@section('content')

<div class="panel-body">

    {{ Form::open(['url' => route('transports.update', $transport->id), 'method'=> 'put', 'class' => 'col-md-6 col-md-offset-3']) }}
    {{ csrf_field() }}
    {!! Form::hidden('id', $transport->id) !!}
    {!! Form::formDropDown('firma_id', selectableCompany(), $transport->firma_id, 'Selecteaza Firma') !!}
    {!! Form::formInput('adresa_plecare', 'Adresa Plecare', $transport->adresa_plecare ) !!}
    {!! Form::formInput('adresa_destinatie', 'Adresa Destinatie', $transport->adresa_destinatie ) !!}
    {!! Form::formInput('km', 'Disanta(km)', $transport->km ) !!}
    {!! Form::formInput('dislocare_km', 'Dislocare(km)', $transport->dislocare_km ) !!}
    {!! Form::formInput('data_plecare', 'Data Plecare', $transport->data_plecare->format('d/m/Y'), ['class' => 'datetimepicker']) !!}
    {!! Form::formInput('timp', 'Durata Transport', $transport->timp ) !!}
    {!! Form::formInput('kg', 'Kilograme/Transport', $transport->kg ) !!}
    {!! Form::formInput('suma', 'Valoare Transport (Lei)', $transport->suma ) !!}
    {!! Form::submit('Modifica',['class'=>'btn btn-primary'])!!}
    {{ Form::close() }}
</div>
@push('scripts')
<script>
    $('.datetimepicker').datetimepicker({
        minView: 2,
        format: 'dd/mm/yyyy',
        autoclose: true
    });
</script>
@endpush
@endsection