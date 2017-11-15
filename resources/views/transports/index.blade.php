@extends('layouts.app')

@section('content')

@include('transports.table.details')

@push('scripts')
<script>
    $(document).ready(function () {
        $(document).ready(function () {
            $('#transporturi').DataTable();
        });
    });
</script>
@endpush

@endsection