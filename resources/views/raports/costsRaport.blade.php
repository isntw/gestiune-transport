@extends('layouts.app')

@section('content')

@include('raports.table.costs')
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('#transporturi').DataTable({
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api(), data;
                var intVal = function (i) {
                    return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i : 0;
                };
                // This is for the Total text
                var col0 = api
                        .column(0)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                //First, please note var name col1 and we use it then
                var col1 = api
                        .column(3)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                $(api.column(0).footer()).html('Total');
                // Here you can add the rows
                $(api.column(3).footer()).html(col1);
            },
            "order": []
        });
    });
</script>
@endpush