    @extends('layout.main')

    @section('title', 'Dashboard')

    @section('isi')
            <div class="row py-5">
            @foreach($barang as $brg)
            <div class="col-md-3">
            <x-card style="width: 18rem;heigth:50px">
                <img class="card-img-top" src="{{ asset('storage/'.$brg->path_image) }}" height="100px" alt="Card image cap">
                <div class="card-body text-center">
                  <h5 class="card-title"> {{ $brg->kode_barang }} {{ $brg->nama_barang }} </h5>
                  <h5 class="card-text"><span class="bg bg-danger">Rp.{{ format_uang($brg->harga_jual) }}</span></h5>
                 </div>
             </x-card>
              </div>
            @endforeach
            </div>
    @endsection>