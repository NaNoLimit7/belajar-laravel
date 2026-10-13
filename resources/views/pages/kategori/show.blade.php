@extends('layouts.master')

@section('konten')
    <h1>Daftar kategori produk</h1>
    <hr>
    <a href="/kategori/create" class="btn btn-primary mb-3">Tambah Kategori</a>
    @if (session('message'))
        <div class="alert alert-primary">{{ session('message') }}</div>
    @endif
    <div class="card">
        <div class="card-header">
            Tabel Kategori
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategori as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <button class="btn btn-danger">Hapus</button>
                                <a href="/kategori/{{ $item->id_kategori }}/edit" class="btn btn-warning">Edit</a>
                                <a href="/kategori/{{ $item->id_kategori }}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Data yang anda cari tidak ada!!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection()
