<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // query untuk menambah data
        DB::table('tb_kategori')->insert([
            [
                'nama_kategori'=>'Mainan',
                'deskripsi'=>'koleksi mainan pc'
            ], [
                'nama_kategori'=>'Elektron',
                'deskripsi'=>'barang elektronik'
            ], [
                'nama_kategori'=>'Household',
                'deskripsi'=>'properti rumah tangga'
            ]
        ]);

        DB::table('tb_produk')->insert([
            [
                'kode_produk'=>'A001',
                'nama_produk'=>'Kaset PUBG:Battleground',
                'harga'=>1500000,
                'deskripsi_produk'=>'hiburan',
                'stok'=>100,
                'kategori_id'=>1,
                'created_at'=>now()
            ], [
                'kode_produk'=>'A002',
                'nama_produk'=>'Kulkas 7 Pintu',
                'harga'=>1250000,
                'deskripsi_produk'=>'menyimpan makanan dan minuman',
                'stok'=>12,
                'kategori_id'=>2,
                'created_at'=>now()
            ], [
                'kode_produk'=>'A003',
                'nama_produk'=>'Pel',
                'harga'=>130000,
                'deskripsi_produk'=>'untuk membersihkan lantai',
                'stok'=>12,
                'kategori_id'=>3,
                'created_at'=>now()
            ],
        ]);
    }
}
