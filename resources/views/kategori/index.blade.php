@extends('layout.main')
@section('title','Data Kategori') 
@section('isi')
        <x-card>
        <x-slot name="header">
        <h5>Table Kategori</h5>
        
        </x-slot>
        <div>
         <a href="{{ route('kategori.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
        </div>
        <form action="" class="d-flex justify-content-between mt-3">
            <x-DropdownTable />
            <x-FilterTable />
        </form>
        <x-table mt-3>
        
        <x-slot name="thead">
        <th width="5">No</th>
        <th>Nama Kategori</th>
        <th class="text-center"><i class="fa fa-cog fa-spin"></i></th>
        </x-slot>
        <tbody>
            @foreach ($kategori as $key => $item)
            <tr>
                <td><x-NumberTable :key="$key" :model="$kategori" /></td>
                <td>{{ $item->nama_kategori }}</td>
                <td>
                <center>
                    <form action="{{ route('kategori.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('delete')
                        
                        <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-link text-primary"><i class="fas fa-pencil-alt"></i></a>
                        <button class="btn btn-link text-danger" onclick="return confirm('Yakin Hapus Data')"><i class="fas fa-trash-alt"></i></button>
                        </center>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

        </x-table>
        <x-PaginationTable :model="$kategori"/>
        </x-card>
@endsection
<x-toast/>