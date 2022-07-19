<x-modal size="modal-xl" data-backdrop="static" data-keyboard="false">
    <x-slot name="title">
        Tambah
    </x-slot>
    @method('post')

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="title">Kode Barang</label>
                <input type="text" name="kode_barang" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="title">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" autocomplete="off">
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" class="form-control">
                <option value="">--Pilih--</option>
                @foreach ($kategori as $key => $item)
                        <option value="{{ $key }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="title">Harga Beli</label>
                <input type="text" name="harga_beli" class="form-control" autocomplete="off">
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="title">Harga Jual</label>
                <input type="text" name="harga_jual" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="title">Stok</label>
                <input type="text" name="stok" class="form-control" autocomplete="off">
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="path_image">Gambar</label>
                <div class="custom-file">
                    <input type="file" name="path_image" class="custom-file-input" id="path_image"
                        onchange="preview('.preview-path_image', this.files[0])">
                    <label class="custom-file-label" for="path_image">Choose file</label>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
        <img src="" class="img-thumbnail preview-path_image img" style="display: none;">
        </div>
        </div>
      <x-slot name="footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success" onclick="submitForm(this.form)"><i class="fa fa-save mr-2"></i>Simpan</button>
    </x-slot>
</x-modal>