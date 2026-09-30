<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/about', function(){
    return view('pages.about',[
        'nama'=>'Rakhmanullah Asyhari',
        'umur'=>21,
        'alamat'=>'Indonesia',
    ]);
});

// Route::get('/about/{id}', function($id){
//     return view('pages.detail',
//     [
//         'nomor'=>$id
//     ]);
// });

Route::view('/contact','pages.contact');
Route::get('/product',[ProdukController::class,'index']); // read data (menampilkan data)
Route::get('/product/create',[ProdukController::class,'create']); // menampilkan form data
Route::post('/product', [ProdukController::class,'store']); // untuk mengelola data yang telah dikirim dari form data
Route::get('/product/{id}', [ProdukController::class, 'show']); // untuk menampilkan halaman detail data sesuai id
Route::get('/product/{id}/edit', [ProdukController::class, 'edit']);
Route::put('/product/{id}', [ProdukController::class, 'update']);
Route::delete('/product/{id}', [ProdukController::class, 'destroy']);

Route::resource('/kategori',KategoriController::class);