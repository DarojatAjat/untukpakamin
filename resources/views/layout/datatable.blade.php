
@push('cssdatatable')
    {{-- CSS DataTables --}}
<link href="{{ asset('tokoku/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
{{-- {{  }} --}}
@endpush

@push('jsdatatable')
{{-- javascript Datatables --}}
<script src="{{ asset('tokoku/demo/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('tokoku/demo/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('tokoku/demo/datatables-demo.js') }}"></script>
{{-- {{  }} --}}
@endpush
