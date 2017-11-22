@extends('layouts.app')

@section('content')
<div class="panel-body">
    {{ Form::open(['url' => route('companies.update', $company->id), 'method'=> 'PUT', 'class' => 'col-md-6 col-md-offset-3']) }}
    {{ csrf_field() }}
    {!! Form::hidden('id', $company->id) !!}
    {!! Form::formInput('name', 'Nume Firma', $company->name) !!}
    {!! Form::formInput('cui', 'CUI', $company->cui) !!}
    {!! Form::formTextArea('note', 'Detalii',null, $company->note) !!}
    {!! Form::submit('Modifica',['class'=>'btn btn-primary'])!!}
    {{ Form::close() }}
</div>
@endsection\
