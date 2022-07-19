@extends('layout.main')
@section('title','Data Barang') 
@section('isi')
@includeIf('layout.datatable')
        <x-card>
        <x-slot name="header">
        <h5>Table Barang</h5>
        
        </x-slot>
        <div>
         <button onclick="addForm(`{{ route('barang.store') }}`)" class="btn btn-primary my-3"><i class="fas fa-plus-circle"></i> Tambah</button>
        </div>
        <x-table>
        <x-slot name="thead">
        <th width="5">No</th>
        <th>Foto</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Harga Jual</th>
        <th>Harga Beli</th>
         <th>Harga Stok</th>
        <th class="text-center"><i class="fa fa-cog fa-spin"></i></th>
        </x-slot>
        <tbody>
           <tr>
           </tr>
        </tbody>
        </x-table>
        </x-card>
@includeIf('barang.form')
@endsection
<x-toast/>

@push('scripts')
<script>
let modal = '#modal-form';
let table;
    table = $('.table').DataTable({
        processing: true,
        autoWidth: false,
        destroy: true,
        serverSide: true,
        order: [],
        lengthMenu: [
        [5, 10, 50, -1],
        [5, 10, 50, "ALL"]
        ],
        ajax: {
            url: '{{ route('barang.data') }}',
        },
        columns: [
            {data: 'DT_RowIndex', searchable: false, sortable: false},
            {data: 'path_image', searchable: false, sortable: false},
            {data: 'kode_barang'},
            {data: 'nama_barang'},
            {data: 'nama_kategori'},
            {data: 'harga_beli', searchable: false, sortable: false},
            {data: 'harga_jual', searchable: false, sortable: false},
             {data: 'stok', searchable: false, sortable: false},
            {data: 'aksi', searchable: false, sortable: false},
        ]
    });
function addForm(url, title = 'Tambah Data Barang') {
        $(modal).modal('show');
        $(`${modal} .modal-title`).text(title);
         $(`${modal} form`)[0].reset();
        $(`${modal} form`).attr('action', url);
        $(`${modal} [name=_method]`).val('post');
        resetForm();
    }

    function submitForm(originalForm) {
        $.post({
                url: $(originalForm).attr('action'),
                data: new FormData(originalForm),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false
            })
            .done(response => {
                $(modal).modal('hide');
                showAlert(response.message, 'success');
                table.ajax.reload();
            })
            .fail(errors => {
                if (errors.status == 422) {
                    loopErrors(errors.responseJSON.errors);
                    return;
                }
                showAlert(errors.responseJSON.message, 'danger');
            });
    }
    function editForm(url, title = 'Edit Data Barang') {
    $.get(url)
            .done(response => {
                $(modal).modal('show');
                $(`${modal} .modal-title`).text(title);
                $(`${modal} form`).attr('action', url);
                $(`${modal} [name=_method]`).val('put');
                resetForm(`${modal} form`);
                loopForm(response.data);
                $(`${modal} [name=kategori]`).val(response.data.id_kategori);
            })
            .fail(errors => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }
    function deleteData(url) {
        Swal.fire({
        title: 'Anda Yakin Logout',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, Yakin Logout!'
      }).then((result) => {
        if (result.isConfirmed) {
         $.post(url, {
                    '_method': 'delete'
                })
                .done(response => {
                    showAlert(response.message, 'success');
                    table.ajax.reload();
                })
                .fail(errors => {
                    showAlert('Tidak dapat menghapus data');
                    return;
                });
        }
      })
    }

    function resetForm(selector){
     $(selector)[0].reset();
     $('img').removeAttr('src');
     $('.form-control, .custom-file-input').removeClass('is-invalid');
     $('.invalid-feedback').remove();
    }
    function loopForm(originalForm){
        for (field in originalForm) {
        if($(`[name=${field}]`).attr('type') != 'file'){
         $(`[name=${field}]`).val(originalForm[field]);
         $('select').trigger('change');
        }else{
         $(`.preview-${field}`)
         .attr('src',originalForm[field])
         .show();
        }
        }
    }
    function  loopErrors(errors){
     $('.invalid-feedback').remove();
     if(errors==undefined){
        return;
     }
     for (error in errors) {
    $(`[name=${error}]`).addClass('is-invalid');
        $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
       .insertAfter($(`[name=${error}]`));
     }
     

    }
  function showAlert(message,type){
    let title='';
    switch (type) {
        case 'success':
            title='success';
            break;
        case 'danger':
            title='Failed';
            break;
        default:
            break;
    }
      Swal.fire({
        icon: `bg-${type}`,
        title: title,
        text: `${message}`,
    });
  }
</script>
@endpush