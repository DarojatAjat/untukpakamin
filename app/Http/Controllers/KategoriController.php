<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;


// Tampildata Kategori
class KategoriController extends Controller
{
    protected $paginate = 3;
    public function index(Request $request)
    {
        $kategori = Kategori::orderBy('nama_kategori')
            ->when($request->has('q') && $request->q != "", function ($query) use ($request) {
                $query->where('nama_kategori', 'LIKE', '%' . $request->q . '%');
            })
            ->paginate($request->rows ?? $this->paginate)
            ->appends($request->only('rows', 'q'));

        return view('kategori.index', compact('kategori'));
    }
    // Form Simpan Kategori
    public function create()
    {
        return view('kategori/create');
    }
    // Proses Simpan
    public function store(Request $r)
    {
        $this->validate($r, [
            'nama_kategori' => 'required|unique:tb_kategori,nama_kategori'
        ]);

        $data = $r->only('nama_kategori');
        Kategori::create($data);

        return redirect()->route('kategori.index')
            ->with([
                'message' => 'Kategori berhasil ditambahkan',
                'success' => true,
            ]);
    }
    // form Update
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }
    // Proses Update
    public function update(Request $request, Kategori $kategori)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|unique:tb_kategori,nama_kategori,' . $kategori->id
        ]);

        $data = $request->only('nama_kategori');
        $kategori->update($data);

        return redirect()->route('kategori.index')
            ->with([
                'message' => 'Kategori berhasil diperbarui',
                'success' => true,
            ]);
    }
    // Hapus Data Kategori
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')
            ->with([
                'message' => 'Kategori berhasil dihapus',
                'success' => true,
            ]);
    }
}
