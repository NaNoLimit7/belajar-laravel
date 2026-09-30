<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    // inisialisasi tabel produk
    protected $table = 'tb_produk';

    // inisialisasi primary key di dalam tabel
    protected $primaryKey = 'id_produk';

    // inisialisasi kolom yang dapat diisi
    // protected $fillable = ['nama_produk', 'harga', 'stok'];

    // inisialisasi kolom yang tidak boleh diisi (harus memilih satu antara $fillable atau $guarded )
    protected $guarded = ['id_produk'];
}
