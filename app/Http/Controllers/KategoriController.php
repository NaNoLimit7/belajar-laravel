<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // query untuk ambil semua data -> get()
        // DB::table('tb_kategori')->get();
        $kategori = kategori::get();
        return view('pages.kategori.show', compact(('kategori')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kategori.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|min:4|max:10',
            'deskripsi_kategori' => 'required'
        ], [
            'nama_kategori.required' => 'nama kategori wajib diisi',
            'nama_kategori.min' => 'minimal berisi 4 karakter',
            'nama_kategori.max' => 'maximal berisi 10 karakter',
            'deskripsi_kategori.required' => 'deskripsi kategori wajib diisi'
        ]);

        kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi_kategori
        ]);

        return redirect('/kategori')->with('message', 'berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = kategori::findOrFail($id);

        return view('pages.kategori.detail', [
            'kategori' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = kategori::findOrFail($id);

        return view('pages.kategori.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|min:6',
            'deskripsi_kategori' => 'required'
        ], [
            'nama_kategori.required' => 'inputan nama kategori wajib diisi',
            'nama_kategori.min' => 'inputan nama minimal berisi 6 karakter',
            'deskripsi_kategori.required' => 'inputan kategori wajib diisi'
        ]);

        kategori::where('id_kategori', $id)->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi_kategori
        ]);

        return redirect('/kategori')->with('message', 'data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        kategori::findOrFail($id)->delete();
        return redirect('/kategori')->with('message', 'data berhasil dihapus');
    }
}
