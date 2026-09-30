@extends('layouts.master')

@section('konten')
    <h1>Detail kategori</h1>
    <div class="card">
      <div class="card-header">
        Detail Kategori
      </div>
      <div class="card-body">
        <img src="https://placehold.co/600x400" class="img-fluid" alt="...">
        <p>Nama kategori : {{ $kategori->nama_kategori }}</p>
        <p>Deskripsi : {{ $kategori->deskripsi }}</p>
        <a href="/kategori" type="button" class="btn btn-primary">Kembali ke kategori</a>
      </div>
    </div>
@endsection