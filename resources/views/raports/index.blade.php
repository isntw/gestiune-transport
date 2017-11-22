@extends('layouts.app')

@section('content')
<div class="panel-body">
    <div class="form-group">
        <label>Selecteaza Categoria</label>
        <div class="radio">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">Transporturi
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Cheltuieli
            </label>
        </div>

    </div>

    <div class="form-group">
        <label>Selecteaza Data/Perioada</label>
        <input type="text" class="form-control" name="daterange" value="01/01/2015 - 01/31/2015" />
    </div>

    <div class="form-group">
        <label>Firme</label>
        <select class="form-control">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Genereaza</button>
</div>


@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('input[name=daterange]').daterangepicker({
            "ranges": {
                "Today": [
                    "2017-11-22T09:02:52.793Z",
                    "2017-11-22T09:02:52.793Z"
                ],
                "Yesterday": [
                    "2017-11-21T09:02:52.793Z",
                    "2017-11-21T09:02:52.793Z"
                ],
                "Last 7 Days": [
                    "2017-11-16T09:02:52.793Z",
                    "2017-11-22T09:02:52.793Z"
                ],
                "Last 30 Days": [
                    "2017-10-24T08:02:52.793Z",
                    "2017-11-22T09:02:52.793Z"
                ],
                "This Month": [
                    "2017-10-31T22:00:00.000Z",
                    "2017-11-30T21:59:59.999Z"
                ],
                "Last Month": [
                    "2017-09-30T21:00:00.000Z",
                    "2017-10-31T21:59:59.999Z"
                ]
            },
            "linkedCalendars": false,
            "autoUpdateInput": false,
            "alwaysShowCalendars": true,
            "startDate": "11/16/2017",
            "endDate": "11/23/2017"
        }, function (start, end, label) {
            console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });
    });

</script>
@endpush