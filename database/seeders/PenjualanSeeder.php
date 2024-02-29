<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_tanggal' => now(),
                'user_id' => 3,
                'pembeli' => 'Bagus',
                'penjualan_kode' => 'PK001',
                'penjualan_tanggal' => now(),
            ],
            [
                'penjualan_tanggal' => now(),
                'user_id' => 3,
                'pembeli' => 'Clara',
                'penjualan_kode' => 'PK002',
                'penjualan_tanggal' => now(),
            ],
            [
                'penjualan_tanggal' => now(),
                'user_id' => 3,
                'pembeli' => 'Dian',
                'penjualan_kode' => 'PK003',
                'penjualan_tanggal' => now(),
            ],
            [
                'penjualan_tanggal' => now(),
                'user_id' => 3,
                'pembeli' => 'Eko',
                'penjualan_kode' => 'PK004',
                'penjualan_tanggal' => now(),
            ],
            [
                'penjualan_tanggal' => now(),
                'user_id' => 3,
                'pembeli' => 'Fitri',
                'penjualan_kode' => 'PK005',
                'penjualan_tanggal' => now(),
            ],
            [
                'penjualan_tanggal' => now(),
                'user_id' => 3,
                'pembeli' => 'Gina',
                'penjualan_kode' => 'PK006',
                'penjualan_tanggal' => now(),
            ],
            [
                'penjualan_tanggal' => now(),
                'user_id' => 3,
                'pembeli' => 'Hendra',
                'penjualan_kode' => 'PK007',
                'penjualan_tanggal' => now(),
            ],
            [
                'penjualan_tanggal' => now(),
                'user_id' => 3,
                'pembeli' => 'Ira',
                'penjualan_kode' => 'PK008',
                'penjualan_tanggal' => now(),
            ],
            [
                'penjualan_tanggal' => now(),
                'user_id' => 3,
                'pembeli' => 'Joni',
                'penjualan_kode' => 'PK009',
                'penjualan_tanggal' => now(),
            ],
            [
                'penjualan_tanggal' => now(),
                'user_id' => 3,
                'pembeli' => 'Kiki',
                'penjualan_kode' => 'PK010',
                'penjualan_tanggal' => now(),
            ],
        ];

        DB::table('t_penjualan')->insert($data);
    }
}
