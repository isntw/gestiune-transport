@extends('layouts.app')

@section('content')
@include('companies.table.details')
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