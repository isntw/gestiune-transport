@extends('layouts.app')

@section('content')

<div class="panel-body">

    <form class="col-md-6 col-md-offset-3" role="form" method="post" action="{{route('costs.store')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="cost_category">Select</label>
            <select class="form-control" name="category_id">
                <option disabled selected>Selecteaza categoria</option>
                @foreach($costs as $cost) 
                <option value="{{$cost->id}}">{{$cost->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="pay_date">Data Cheltuiala</label>
            <input type="text" class="form-control datetimepicker" name="pay_date">
        </div>
        <div class="form-group">
            <label for="suma">Suma</label>
            <input class="form-control" name="suma">
        </div>
        <div class="form-group">
            <label for="detalii">Detalii</label>
            <textarea class="form-control" rows="5" name="detalii"></textarea>
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
//format: 'dd/mm/yyyy',
autoclose: true
});
</script>
@endpush
@endsection