@extends('layouts.master')

@section('title', 'Detail Kategori')

@section('konten')
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