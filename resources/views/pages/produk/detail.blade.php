@extends('layouts.master')

@section('title', 'Detail produk')

@section('konten')
    <div class="card">
        <div class="card-header">
            Detail Produk
        </div>
        <div class="card-body">
          @if ($produk->gambar == null)
              <p>Tidak ada gambar</p>
          @else
          <img src="{{ asset('gambar_produk/'.$produk->gambar) }}" class="img-fluid" width="500" alt="...">
          @endif
          <p>Nama produk : {{ $produk->nama_produk }}</p>
          <p>Harga : Rp.{{ $produk->harga }}</p>
          <p>Deskripsi : {{ $produk->deskripsi_produk }}</p>
          <p>Kategori : Barang elektronik</p>
          <p>Stok : Tersedia 5</p>

          <a href="/product" type="button" class="btn btn-primary">Kembali ke produk</a>
        </div>
    </div>
@endsection()
