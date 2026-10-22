@extends('layouts.master')

@section('title', 'Tambah data produk')

@section('konten')
    <div class="card">
        <div class="card-header">tambah data produk</div>
        <div class="card-body">
            <form action="/product" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Nama produk</label>
                            <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk') }}">
                            @error('nama_produk')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Harga produk</label>
                            <input type="number" name="harga_produk" class="form-control"
                                value="{{ old('harga_produk') }}">
                            @error('harga_produk')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" name="stok" class="form-control" value="{{ old('stok') }}">
                            @error('stok')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select class="form-select" aria-label="Default select example" name="kategori">
                                <option selected>Pilih kategori</option>
                                @foreach ($data as $item)
                                    <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" name="deskripsi" placeholder="Leave a comment here" style="height: 100px">{{ old('deskripsi') }}</textarea>
                            <label>Deskripsi produk</label>
                        </div>
                        @error('deskripsi')
                            <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-12 mt-3">
                        <button type="submit" class="btn btn-primary">Tambah data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection()
