@extends('layouts.master')

@section('title', 'Daftar produk')

@section('konten')
    <a href="/product/create" type="button" class="btn btn-primary mb-3">Tambah data</a>

    <div class="alert alert-primary">
        <b>Nama Toko :</b> {{ $data_toko['nama_toko'] }}
        <br>
        <b>Alamat :</b> {{ $data_toko['alamat'] }}
        <br>
        <b>Tipe Toko :</b> {{ $data_toko['type'] }}
    </div>
    @if (session('message'))
        <div class="alert alert-primary">{{ session('message') }}</div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Daftar Produk
            <div class="d-flex gap-2">
                @if (Request()->keyword != '')
                    <a href="/product" class="btn btn-info">Reset</a>
                @endif
                <form class="input-group" style="width: 350px">
                    <input type="text" class="form-control" name="keyword" value="{{ Request()->keyword }}"
                        placeholder="Cari data produk">
                    <button class="btn btn-success" type="submit" id="button-addon2">Cari data</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Kode Produk</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Ketegori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_produk as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{!! DNS1D::getBarcodeHTML($item->kode_produk, 'C39', 2, 50) !!}</td>
                            <td>{{ $item->nama_produk }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#hapus{{ $item->id_produk }}">
                                    Hapus
                                </button>
                                {{-- <button type="button" class="btn btn-danger">Hapus</button> --}}
                                <a href="/product/{{ $item->id_produk }}/edit" class="btn btn-warning">Edit</a>
                                <a href="/product/{{ $item->id_produk }}" type="button" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Data yang anda cari tidak ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    @foreach ($data_produk as $item)
        <!-- Modal -->
        <div class="modal fade" id="hapus{{ $item->id_produk }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="/product/{{ $item->id_produk }}" method="POST" class="modal-content">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi!!</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus produk {{ $item->nama_produk }}??
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus Data</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection()
