@extends('layouts.app')

@section('content')

@include('costs.table.details')
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $(document).ready(function () {
            $('#transporturi').DataTable({
                "order": []
            });
        });
    });
</script>
@endpush