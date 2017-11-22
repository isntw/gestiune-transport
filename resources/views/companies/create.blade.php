@extends('layouts.app')

@section('content')
<div class="panel-body">
    {{ Form::open(['url' => route('companies.store'), 'method'=> 'post', 'class' => 'col-md-6 col-md-offset-3']) }}
    {{ csrf_field() }}
    {!! Form::formInput('name', 'Nume Firma') !!}
    {!! Form::formInput('cui', 'CUI') !!}
    {!! Form::formTextArea('note', 'Detalii') !!}
    {!! Form::submit('Adauga',['class'=>'btn btn-primary'])!!}
    {{ Form::close() }}
</div>
@endsection\
