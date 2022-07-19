@extends('layout.main')
@section('title','Data Kategori') 
@section('isi')
<x-card>
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('kategori.update',$kategori->id) }}" method="post">
            @csrf
              @method('put')
            <x-card>
                <div class="form-group row">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"  name="nama_kategori" 
                    value="{{ old('nama_kategori') ?? $kategori->nama_kategori }}"  autofocus autocomplete="off">
                    @error('nama_kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <x-slot name="footer">
                   <a href="{{ route('kategori.index') }}" class="btn btn-danger"><i class="fas fa-angle-double-left mr-2">
                    </i>kembali</a>
                    <button class="btn btn-success"><i class="fa fa-save mr-2"></i>Simpan</button>
                </x-slot>
            </x-card>
        </form>
    </div>
</div>
</x-card>
@endsection

