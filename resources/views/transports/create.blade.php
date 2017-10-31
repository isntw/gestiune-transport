@extends('layouts.app')

@section('content')

<div class="panel-body">

    <form class="col-md-6 col-md-offset-3" role="form" method="post" action="{{route('transports.store')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Firma</label>
            <input class="form-control" name="firma">
            <!--<p class="help-block">Example block-level help text here.</p>-->
        </div>
        <div class="form-group">
            <label>Adresa Plecare</label>
            <input class="form-control" name="adresa_plecare">
            <!--<p class="help-block">Example block-level help text here.</p>-->
        </div>
        <div class="form-group">
            <label>Adresa Destinatie</label>
            <input class="form-control" name="adresa_destinatie">
            <!--<p class="help-block">Example block-level help text here.</p>-->
        </div>
        <div class="form-group">
            <label for="data_plecare">Data Plecare</label>
            <input type="text" class="form-control datetimepicker" name="data_plecare">
        </div>
        <div class="form-group">
            <label for="data_destinatie">Data Plecare</label>
            <input type="text" class="form-control datetimepicker" name="data_destinatie">
        </div>
        <div class="form-group">
            <label>Disanta(km)</label>
            <input class="form-control" name="km">
            <!--<p class="help-block">Example block-level help text here.</p>-->
        </div>
        <div class="form-group">
            <label>Incasare</label>
            <input class="form-control" name="incasare">
            <!--<p class="help-block">Example block-level help text here.</p>-->
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Adauga</button>

        </div>
    </form>
</div>
@push('scripts')
<script src="{{ URL::asset('js/bootstrap-datetimepicker.min.js')}}"></script>
<script>
$('.datetimepicker').datetimepicker({
    minView: 2,
    format: 'dd/mm/yyyy',
    autoclose: true
});
</script>
@endpush
@endsection