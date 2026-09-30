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
        DB::table('tb_produk')->insert([
            [
                'nama_produk'=>'Kaset PUBG:Battleground',
                'harga'=>15000000,
                'deskripsi_produk'=>'Ini adalah sebuah deskripsi dummy',
                'kategori_id'=>'2',
                'created_at'=>now()
            ],[
                'nama_produk'=>'Laptop LOQ Modern 14',
                'harga'=>13500000,
                'deskripsi_produk'=>'Ini adalah sebuah deskripsi dummy',
                'kategori_id'=>'2',
                'created_at'=>now()
            ],[
                'nama_produk'=>'Huawei Band 10',
                'harga'=>1500000,
                'deskripsi_produk'=>'Ini adalah sebuah deskripsi dummy',
                'kategori_id'=>'2',
                'created_at'=>now()
            ]
        ]);
    }
}
