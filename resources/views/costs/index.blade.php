@extends('layouts.app')

@section('content')

@include('costs.table.details')
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