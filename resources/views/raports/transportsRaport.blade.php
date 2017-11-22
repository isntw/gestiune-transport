@extends('layouts.app')

@section('content')
@include('raports.table.transports')
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $(document).ready(function () {
            $('#transporturi').DataTable({
                "order": []
            });
        });
    }
    );
</script>
@endpush