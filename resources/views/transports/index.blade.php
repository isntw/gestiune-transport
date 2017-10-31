@extends('layouts.app')

@section('content')

@include('transports.table.details')

@push('scripts')
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function () {
    $(document).ready(function () {
        $('#transporturi').DataTable();
    });
});
</script>
@endpush

@endsection