<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // syntax di bawah digunakan untuk membuat tabel produk
        Schema::create('tb_produk', function (Blueprint $table) {
            $table->id('id_produk');// defaultnya id()
            $table->string('kode_produk')->unique(); //unique agar satu produk tidak memiliki kode yang sama dengan produk lainnya
            $table->string('nama_produk', 150); // default length dari laravel adalah 255
            $table->bigInteger('harga');
            $table->text('deskripsi_produk');
            $table->integer('stok');
            $table->string('gambar')->nullable();
            $table->unsignedBigInteger('kategori_id');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id_kategori')->on('tb_kategori')->onDelete('cascade');
            //cascade: jika sebuah kategori dihapus, produk dengan kategori yang dihapus tadi juga ikut terhapus
            //urutan file migrasi di folder migration penting karena pembuatan tabel dimulai dari file paling atas ke paling bawah
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
