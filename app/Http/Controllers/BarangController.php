<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

// Tampil Data Barang
class BarangController extends Controller
{
    public function index()
    {
        $kategori = Kategori::orderBy('nama_kategori')->get()->pluck('nama_kategori', 'id');
        return view('barang.index', compact('kategori'));
    }
    public function data(Request $request)
    {
        if ($request->ajax()) {
            $barang = Barang::leftJoin('tb_kategori', 'tb_kategori.id', 'tb_barang.id_kategori')
                ->select('tb_barang.*', 'nama_kategori')
                ->orderBy('kode_barang', 'asc')
                ->get();
            return datatables()
                ->of($barang)
                ->addIndexColumn()
                ->editColumn('path_image', function ($barang) {
                    $url = asset('storage/' . $barang->path_image);
                    return '<img src="' . $url . '" class="img-thumbnail" width="100px">';
                })
                ->editColumn('kode_barang', function ($barang) {
                    return '<span class="label label-success">' . $barang->kode_barang . '</span>';
                })
                ->editColumn('harga_beli', function ($barang) {
                    return format_uang($barang->harga_beli);
                })
                ->editColumn('harga_jual', function ($barang) {
                    return format_uang($barang->harga_jual);
                })
                ->editColumn('stok', function ($barang) {
                    return format_uang($barang->stok);
                })
                ->editColumn('aksi', function ($barang) {
                    return '
        <div class="btn-group">
            <button type="button" onclick="editForm(`' . route('barang.show', $barang->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-edit"></i></button>
            <button type="button" onclick="deleteData(`' . route('barang.destroy', $barang->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
        </div>
        ';
                })
                ->rawColumns(['path_image', 'kode_barang', 'harga_beli', 'harga_jual', 'stok', 'aksi',])
                ->make(true);
        } else {
            exit("Maaf Tidak Dapat Diproses");
        }
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'kode_barang' => 'required|unique:tb_barang,kode_barang',
                'nama_barang' => 'required|unique:tb_barang,nama_barang',
                'kategori' => 'required',
                'harga_beli' => 'required',
                'harga_jual' => 'required',
                'stok' => 'required',
                'path_image' => 'required|mimes:png,jpg,jpeg|max:2048'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            $data = Barang::create([
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'id_kategori' => $request->kategori,
                'harga_beli' => $request->harga_beli,
                'harga_jual' => $request->harga_jual,
                'stok' => $request->stok,
                'path_image' => upload('barang', $request->file('path_image'), 'barang')
            ]);
            return response()->json(['message' => 'Barang Berhasil Ditambahkan']);
        } else {
            exit("Maaf Tidak Dapat Diproses");
        }
    }
    public function show(Barang $barang)
    {
        $barang->path_image = asset('storage/' . $barang->path_image);
        return response()->json(['data' => $barang]);
    }
    public function edit(Barang $barang)
    {
        //
    }
    public function update(Request $request, Barang $barang)
    {
        if ($request->ajax()) {

            $validator = Validator::make($request->all(), [
                'kode_barang' => 'required',
                'nama_barang' => 'required',
                'kategori' => 'required',
                'harga_beli' => 'required',
                'harga_jual' => 'required',
                'stok' => 'required',
                'path_image' => 'mimes:png,jpg,jpeg|max:2048'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
             if($request->hasfile('path_image')){
             $fotoimg=upload('barang', $request->file('path_image'), 'barang');
             }else{
              $fotoimg=$barang->path_image;
             }

            $foto = $barang->path_image;
            if ($foto != null || $foto != '') {
                Storage::delete($foto);
            }
            $data = [
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'id_kategori' => $request->kategori,
                'harga_beli' => $request->harga_beli,
                'harga_jual' => $request->harga_jual,
                'stok' => $request->stok,
                'path_image' =>$fotoimg
            ];
            $barang->update($data);

            return response()->json(['message' => 'Barang Berhasil Diperbarui']);
        } else {
            exit("Maaf Tidak Dapat Diproses");
        }
    }
    public function destroy(Barang $barang)
    {
        $foto = $barang->path_image;
        if ($foto != null || $foto != '') {
            Storage::delete($foto);
        }
        $barang->delete();
        return response()->json(['message' => 'Barang Berhasil Ditambahkan']);
    }
}
