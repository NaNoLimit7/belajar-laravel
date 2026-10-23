@extends('layouts.master')

@section('title', 'Update data produk')

@section('konten')
    <div class="card">
        <div class="card-header">update data produk</div>
        <div class="card-body">
            <form action="/product/{{ $data->id_produk }}" method="POST" enctype="multipart/form-data"> {{-- enctype digunakan agar form bisa mengirim file gambar --}}
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        @if ($data->gambar == null)
                            <p>Tidak ada gambar</p>
                        @else
                            <img src="{{ asset('gambar_produk/' . $data->gambar) }}" class="img-fluid" width="500"
                                alt="...">
                        @endif
                        <div class="mb-3">
                            <label class="form-label">Gambar produk</label>
                            <input type="file" name="gambar" class="form-control" value="{{ old('gambar') }}">
                            <div id="emailHelp" class="form-text text-warning">*Klik tombol di atas jika ingin mengganti gambar yang sudah ada</div>
                            @error('gambar')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Nama produk</label>
                            <input type="text" name="nama_produk" class="form-control" value="{{ $data->nama_produk }}">
                            @error('nama_produk')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Harga produk</label>
                            <input type="number" name="harga_produk" class="form-control" value="{{ $data->harga }}">
                            @error('harga_produk')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" name="stok" class="form-control" value="{{ $data->stok }}">
                            @error('stok')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select class="custom-select" aria-label="Default select example" name="kategori">
                                @foreach ($kategori as $item)
                                    @if ($item->id_kategori == $data->kategori_id)
                                        <option value="{{ $item->id_kategori }}" selected>{{ $item->nama_kategori }}
                                        </option>
                                    @else
                                        <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('kategori')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <label>Deskripsi produk</label>
                            <textarea class="form-control" name="deskripsi" placeholder="Leave a comment here" style="height: 100px">{{ $data->deskripsi_produk }}</textarea>
                        </div>
                        @error('deskripsi')
                            <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-12 mt-3">
                        <button type="submit" class="btn btn-primary">Update data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection()
