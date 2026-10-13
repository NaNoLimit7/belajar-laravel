@extends('layouts.master')

@section('konten')
    <div class="card">
        <div class="card-header">Tambah Kategori</div>
        <div class="card-body">
            <form action="/kategori" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                          <label class="form-label">Nama Kategori</label>
                          <input type="text" name="nama_kategori" class="form-control" value="{{ old('nama_kategori') }}">
                          @error('nama_kategori')
                              <div class="form-text text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="">
                          <label class="form-label">Deskripsi Kategori</label>
                          <textarea class="form-control" name="deskripsi_kategori" cols="80" rows="2"></textarea>
                          @error('deskripsi_kategori')
                              <div class="form-text text-danger">{{ $message }}</div> // variabel message merupakan bawaan dari laravel
                          @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 mt-3">
                      <button type="submit" class="btn btn-primary">Tambah data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection()
