<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\KategoriDataTable;
use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }

    public function create(): View{
        return view('kategori.create');
    }

    public function store(Request $request): RedirectResponse{
        $validated = $request -> validate([
            'kategori_kode' => 'required|bail',
            'kategori_nama' => 'required|bail',
        ]);
        return redirect('/kategori');
    }

    public function edit($id) {
        $kategori = KategoriModel::find($id);
        return view('kategori.edit', ['data' => $kategori]);
    }

    public function save(Request $request, $id) {
        $kategori = KategoriModel::find($id);

        $kategori -> kategori_kode = $request -> kodeKategori;
        $kategori -> kategori_nama = $request -> namaKategori;

        $kategori -> save();
        return redirect('/kategori');
    }

    public function delete($id){
        $kategori = KategoriModel::find($id);
        $kategori->delete();

        return redirect('/kategori');
    }
}
