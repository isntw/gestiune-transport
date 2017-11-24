@extends('layouts.app')

@section('content')
@include('transports.table.details')
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#transporturi').DataTable({
            "iDisplayLength": 25,
            "order": []
        });
    });
</script>
@endpush