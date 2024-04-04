<?php

namespace App\Http\Controllers;

use App\Models\PenjualanModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PenjualanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Penjualan Barang',
            'list' => ['Home', 'Penjualan']
        ];

        $page = (object)[
            'title' => 'Daftar Penjualan Barang yang terdaftar dalam sistem',
        ];

        $activeMenu = 'penjualan';

        $user = UserModel::all();

        return view('penjualan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $transaction = PenjualanModel::select('penjualan_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal', 'user_id')
                    ->with('user');

        if ($request->user_id) {
            $transaction->where('user_id', $request->user_id);
        }
        
        return DataTables::of($transaction)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($penjualan) { // menambahkan kolom aksi
                $btn = '<a href="'.url('/penjualan/' . $penjualan->penjualan_id).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/penjualan/' . $penjualan->penjualan_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'.url('/penjualan/'.$penjualan->penjualan_id).'">'. csrf_field() . method_field('DELETE') .'<button type="submit" class="btn btn-danger btn-sm"onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
            return $btn;
        })
        ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
        ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Penjualan',
            'list' => ['Home', 'Penjualan', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Penjualan Baru',
        ];

        $user = UserModel::all();
        $activeMenu = 'penjualan';

        return view('penjualan.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request){
        $request->validate([
            'penjualan_kode'    =>'required | string |unique:t_penjualan,penjualan_kode',
            'pembeli'           =>'required | string',
            'penjualan_tanggal' =>'required | date_format:Y-m-d\TH:i',
            'user_id'           =>'required | integer',
        ]);

        PenjualanModel::create([
            'penjualan_kode'    => $request->penjualan_kode,
            'pembeli'           => $request->pembeli,
            'penjualan_tanggal' => $request->penjualan_tanggal,
            'user_id'           => $request->user_id,
        ]);

        return redirect('/penjualan')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id){
        $penjualan = PenjualanModel::with('user')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Penjualan Barang',
            'list' => ['Home', 'Penjualan', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Penjualan Barang',
        ];

        $activeMenu = 'penjualan';

        return view('penjualan.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penjualan' => $penjualan, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id){
        $penjualan = PenjualanModel::find($id);
        $user = UserModel::all();

        $breadcrumb = (object)[
            'title' => 'Edit Penjualan Barang',
            'list' => ['Home', 'Penjualan', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Penjualan Barang',
        ];

        $activeMenu = 'penjualan';

        return view('penjualan.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penjualan' => $penjualan, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'penjualan_kode'    =>'required | string |unique:t_penjualan,penjualan_kode,'.$id.',penjualan_id',
            'pembeli'           =>'required | string',
            'penjualan_tanggal' =>'required | date_format:Y-m-d\TH:i',
            'user_id'           =>'required | integer',
        ]);

        PenjualanModel::find($id)->update([
            'penjualan_kode'    => $request->penjualan_kode,
            'pembeli'           => $request->pembeli,
            'penjualan_tanggal' => $request->penjualan_tanggal,
            'user_id'           => $request->user_id,
        ]);

        return redirect('/penjualan')->with('success', 'Data berhasil diubah!');;
    }

    public function destroy($id)
    {
        $check = PenjualanModel::find($id);
        if(!$check){
            return redirect('/penjualan')->with('error', 'Data tidak ditemukan!');
        }

        try{
            PenjualanModel::destroy($id);
            return redirect('/penjualan')->with('success', 'Data berhasil dihapus!');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect('/penjualan')->with('error', 'Data gagal dihapus! masih terdapat tabel lain yang terikat dengan data ini!');
        }
    }
}
