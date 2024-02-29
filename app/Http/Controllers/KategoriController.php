<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        // $data = [
        //     'kategori_kode' => 'FGR',
        //     'kategori_nama' => 'Action Figure',
        //     'created_at' => now()
        // ];
        // DB::table('m_kategori')->insert($data);
        // return 'Insert Data berhasil';

        // $row = DB::table('m_kategori')->where('kategori_kode', 'FGR')->update(['kategori_nama' => 'Figurin Aksi']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' .$row. ' baris';

        // $row = DB::table('m_kategori')->where('kategori_kode', 'FGR')->delete();
        // return 'Delete data berhasil, Jumlah data yang dihapus: ' .$row. ' baris';

        $data = DB::table('m_kategori')->get();
        return view('kategori', ['data' => $data]);
    }
}
