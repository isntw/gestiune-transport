@extends('layouts.app')

@section('content')

<div class="panel-body">

    {!! Form::open(['url' => route('transports.store'), 'method'=> 'post', 'class' => 'col-md-6 col-md-offset-3']) !!}
    {!! csrf_field() !!}
    {!! Form::formDropDown('firma_id', selectableCompany(), null, 'Selecteaza Firma') !!}
    {!! Form::formInput('adresa_plecare', 'Adresa Plecare') !!}
    {!! Form::formInput('adresa_destinatie', 'Adresa Destinatie') !!}
    {!! Form::formInput('km', 'Disanta(km)') !!}
    {!! Form::formInput('dislocare_km', 'Dislocare(km)') !!}
    {!! Form::formInput('data_plecare', 'Data Plecare', null, ['class' => 'datetimepicker']) !!}
    {!! Form::formInput('timp', 'Durata Transport') !!}
    {!! Form::formInput('kg', 'Kilograme/Transport') !!}
    {!! Form::formInput('suma', 'Valoare Transport (Lei)') !!}
    {!! Form::submit('Adauga',['class'=>'btn btn-primary'])!!}
    {!! Form::close() !!}
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('.datetimepicker').datetimepicker({
            minView: 2,
            format: 'dd/mm/yyyy',
            autoclose: true
        });
    });
</script>
@endpush