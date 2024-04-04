<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\StokModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class StokController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Stok Barang',
            'list' => ['Home', 'Stok']
        ];

        $page = (object)[
            'title' => 'Daftar Stok Barang dalam sistem',
        ];

        $activeMenu = 'stok';

        $barang = BarangModel::all();
        $user = UserModel::all();

        return view('stok.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $stoks = StokModel::select('stok_id', 'stok_tanggal', 'stok_jumlah', 'barang_id', 'user_id')
                    ->with('barang')
                    ->with('user');

        if ($request->barang_id) {
            $stoks->where('barang_id', $request->barang_id);
        }

        if ($request->user_id) {
            $stoks->where('user_id', $request->user_id);
        }
        
        return DataTables::of($stoks)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($stok) { // menambahkan kolom aksi
                $btn = '<a href="'.url('/stok/' . $stok->stok_id).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/stok/' . $stok->stok_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'.url('/stok/'.$stok->stok_id).'">'. csrf_field() . method_field('DELETE') .'<button type="submit" class="btn btn-danger btn-sm"onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
            return $btn;
        })
        ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
        ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Stok Barang',
            'list' => ['Home', 'Stok', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Stok Barang',
        ];

        $barang = BarangModel::all();
        $user = UserModel::all();
        $activeMenu = 'stok';

        return view('stok.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request){
        $request->validate([
            'stok_tanggal' => 'required | date_format:Y-m-d\TH:i:s',
            'stok_jumlah' => 'required | integer',
            'barang_id' =>'required | integer',
            'user_id' =>'required | integer'
        ]);

        StokModel::create([
            'stok_tanggal'  => $request->stok_tanggal,
            'stok_jumlah'  => $request->stok_jumlah,
            'barang_id' => $request->barang_id,
            'user_id' => $request->user_id
        ]);

        return redirect('/stok')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id){
        $stok = StokModel::with('barang')->with('user')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Stok Barang',
            'list' => ['Home', 'Stok', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Stok Barang',
        ];

        $activeMenu = 'stok';

        return view('stok.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stok' => $stok, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id){
        $stok = StokModel::find($id);
        $barang = BarangModel::all();
        $user = UserModel::all();

        $breadcrumb = (object)[
            'title' => 'Edit Stok Barang',
            'list' => ['Home', 'Stok', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Stok Barang',
        ];

        $activeMenu = 'stok';

        return view('stok.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stok' => $stok, 'barang' => $barang, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'stok_tanggal' => 'required | date:t_stok,'.$id.',stok_id',
            'stok_jumlah' => 'required | integer',
            'barang_id' =>'required | integer',
            'user_id' =>'required | integer'
        ]);

        StokModel::find($id)->update([
            'stok_tanggal'  => $request->stok_tanggal,
            'stok_jumlah'  => $request->stok_jumlah,
            'barang_id' => $request->barang_id,
            'user_id' => $request->user_id
        ]);

        return redirect('/stok')->with('success', 'Data berhasil diubah!');;
    }

    public function destroy($id)
    {
        $check = StokModel::find($id);
        if(!$check){
            return redirect('/stok')->with('error', 'Data tidak ditemukan!');
        }

        try{
            StokModel::destroy($id);
            return redirect('/stok')->with('success', 'Data berhasil dihapus!');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect('/stok')->with('error', 'Data gagal dihapus! masih terdapat tabel lain yang terikat dengan data ini!');
        }
    }
}