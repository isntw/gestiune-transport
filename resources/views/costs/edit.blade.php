@extends('layouts.app')

@section('content')

<div class="panel-body">

    {{ Form::open(['url' => route('costs.store'), 'method'=> 'post', 'class' => 'col-md-6 col-md-offset-3']) }}
    {{ csrf_field() }}
    {!! Form::hidden('id', $cost->id) !!}
    {!! Form::formDropDown('category_id', selectableCostCategory(), $cost->category_id) !!}
    {!! Form::formInput('pay_date', 'Data Cheltuiala', $cost->pay_date->format('d/m/Y'), ['class' => 'datetimepicker']) !!}
    {!! Form::formInput('suma', 'Suma', $cost->suma ) !!}
    {!! Form::formTextArea('detalii', 'Detalii',5, $cost->detalii) !!}
    {!! Form::submit('Adauga',['class'=>'btn btn-primary'])!!}
    {{ Form::close() }}

</div>
@endsection\

@push('scripts')
<script>
    $('.datetimepicker').datetimepicker({
        minView: 2,
        format: 'dd/mm/yyyy',
        autoclose: true
    });
</script>
@endpush