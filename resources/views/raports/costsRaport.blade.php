@extends('layouts.app')

@section('content')

@include('raports.table.costs')
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