<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use App\Models\produk;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\RedisSessionHandler;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\support\Str;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $toko = [
            'nama_toko' => 'Jaya Abadi Putera',
            'alamat' => 'Banjarnegara, Jawa Tengah',
            'type' => 'Ruko'
        ];

        $search = $request->keyword;

        $produk = produk::when($search,function($query, $search){
            return $query->where('nama_produk','like', "%{ $search }%")
            ->orWhere('deskripsi_produk', 'like', "%{ $search }%");
        })
        ->join('tb_kategori', 'tb_produk.kategori_id', '=', 'tb_kategori.id_kategori') //jika join maka dua tabel disambungkan menggunakan foreign key dan primary key
        ->get();
        // query untuk mengambil semua data yang berada di tb_produk
        // $queryBuilder = DB::table('tb_produk')->get(); // query menggunakan query builder (kegunaany sama dg syntax di atas)
        return view('pages.produk.show', [
            'data_toko' => $toko,
            'data_produk' => $produk
        ]);
    }

    public function create()
    {
        $data_kategori = kategori::get();
        return view('pages.produk.add', [
            'data' => $data_kategori
        ]);
    }

    public function store(Request $request)
    {
        // validasi
        $request->validate([
            'nama_produk' => 'required|min:8|max:12',
            'harga_produk' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|max:100',
            'kategori' => 'required'
        ], [
            'nama_produk.min' => 'nama produk minimal 8 karakter',
            'nama_produk.max' => 'nama produk maksimal 12 karakter',
            'nama_produk.required' => 'inputan nama produk wajib diisi',
            'harga_produk.required' => 'inputan harga produk wajib diisi',
            'deskripsi.required' => 'inputan deskripsi wajib diisi',
            'stok.required' => 'inputan stok wajib diisi',
            'stok.max' => 'stok maksimal 100 stok',
            'kategori.required' => 'opsi kategori harus diisi'
        ]);

        // untuk menambahkan data ke tb_produk
        // DB::table('tb_produk')->create([]);
        // query tambah data
        produk::create([
            'kode_produk' => Str::random(5),
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga_produk,
            'deskripsi_produk' => $request->deskripsi,
            'kategori_id' => $request->kategori,
            'stok' => $request->stok
        ]);

        // setelah data berhasil ditambah, akan mengarahkan ke halaman /product dan memberikan notif berhasil me....
        return redirect('/product',)->with('message', 'berhasil menambahka data');
    }

    public function show($id)
    {
        // query atau perintah
        // eloquent orm
        $data = produk::findOrFail($id);
        

        // query builder
        // DB::table('tb_produk')->where('id_produk', $id)->firstOrFail();
        return view('pages.produk.detail', [
            'produk' => $data
        ]);
    }

    public function edit($id) {
        // mengambil satu data spesifik dari id yang dikirimkan dari paramater
        $data = produk::findOrFail($id);
        $data_kategori = kategori::get();

        return view('pages.produk.edit', [
            'data' => $data,
            'kategori' => $data_kategori
        ]);
    }

    public function update($id, Request $request){
        
        $request->validate([
            'nama_produk' => 'required|min:8',
            'harga_produk' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|max:100',
            'kategori' => 'required'
        ], [
            'nama_produk.min' => 'Nama produk minimal 8 karakter',
            'nama_produk.required' => 'inputan nama produk wajib diisi',
            'harga_produk.required' => 'inputan harga produk wajib diisi',
            'deskripsi.required' => 'inputan deskripsi wajib diisi',
            'stok.required' => 'inputan stok wajib diisi',
            'stok.max' => 'stok maksimal 100 stok',
            'kategori.required' => 'opsi kategori harus diisi'
        ]);

        // query untuk simpan data yang telah kita update
        produk::where('id_produk', $id)->update([
            'nama_produk'=>$request->nama_produk,
            'harga'=>$request->harga_produk,
            'deskripsi_produk'=>$request->deskripsi,
            'stok'=>$request->stok,
            'kategori_id'=>$request->kategori,
        ]);

        return redirect('/product')->with('message', 'Data berhasil diedit');
    }

    public function destroy($id){
        // query untuk menghapus data di database
        produk::findOrFail($id)->delete();
        return redirect('/product')->with('message', 'Data berhasil dihapus');
    }
}
