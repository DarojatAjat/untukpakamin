@push('scripts')
    @if (session()->has('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('message') }}',
    });
    </script>
    @elseif (session()->has('error_msg'))
    <script>
         Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('message') }}',
    });
    </script>
    @endif
@endpush