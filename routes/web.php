<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// get
// USER PAGE
Route::get('/sitemap.xml', 'sitemapController@index');
Route::get('/robots', 'robotController@index');

Route::get('/laravel', function(){
    return redirect('https://guidenesia.id/laravel/public/');
});

Route::get('/', 'userController@index');
Route::get('home', 'userController@index');
Route::get('spot/{slug}', 'userController@detail_spot');
Route::get('contact', 'userController@page_kontak');
Route::get('about', 'userController@page_about');
Route::get('cari', 'userController@pencarian');
Route::get('search', 'userController@search');
Route::get('tag/{tag}', 'userController@tag');
Route::get('kota/{kota}', 'userController@kota');
Route::get('all/spot', 'userController@catalog');

// post
// USER PAGE
Route::post('contact/send', 'userController@send_email_contact');
Route::post('subscribe/us', 'userController@addNewsLetter');

// ADMIN PAGE
// user
Route::get('admin', 'adminController@index');
Route::get('admin/users/list', 'adminController@list_user');
Route::get('admin/users/tambah', 'adminController@tambah_user');
Route::get('admin/users/edit/{id}', 'adminController@edit_user');
Route::get('admin/users/hapus/{id}', 'adminController@hapus_user');
// kategori spot
Route::get('admin/spot/kategori/list', 'adminController@list_kategori_spot');
Route::get('admin/spot/kategori/tambah', 'adminController@tambah_kategori_spot');
Route::get('admin/spot/kategori/edit/{id}', 'adminController@edit_kategori_spot');
Route::get('admin/spot/kategori/hapus/{id}', 'adminController@hapus_kategori_spot');
// kategori blog
Route::get('admin/blog/kategori/list', 'adminController@list_kategori_blog');
Route::get('admin/blog/kategori/tambah', 'adminController@tambah_kategori_blog');
Route::get('admin/blog/kategori/edit/{id}', 'adminController@edit_kategori_blog');
Route::get('admin/blog/kategori/hapus/{id}', 'adminController@hapus_kategori_blog');
// provinsi
Route::get('admin/provinsi/list', 'adminController@list_provinsi');
Route::get('admin/provinsi/tambah', 'adminController@tambah_provinsi');
Route::get('admin/provinsi/edit/{id}', 'adminController@edit_provinsi');
Route::get('admin/provinsi/hapus/{id}', 'adminController@hapus_provinsi');
// Kota
Route::get('admin/kota/list', 'adminController@list_kota');
Route::get('admin/kota/tambah', 'adminController@tambah_kota');
Route::get('admin/kota/edit/{id}', 'adminController@edit_kota');
Route::get('admin/kota/hapus/{id}', 'adminController@hapus_kota');
// spot
Route::get('admin/spot/list', 'adminController@list_spot');
Route::get('admin/spot/list_cari', 'adminController@list_cari_spot');
Route::get('admin/spot/tambah', 'adminController@tambah_spot');
Route::get('admin/spot/edit/{id}', 'adminController@edit_spot');
Route::get('admin/spot/hapus/{id}', 'adminController@hapus_spot');
// galeri (1 page instead)
Route::get('admin/spot/galeri/{id}', 'adminController@olah_galeri');
Route::get('admin/spot/galeri/hapus/{id}', 'adminController@hapus_galeri');
// blog
Route::get('admin/blog/list', 'adminController@list_blog');
Route::get('admin/blog/tambah', 'adminController@tambah_blog');
Route::get('admin/blog/edit/{id}', 'adminController@edit_blog');
Route::get('admin/blog/hapus/{id}', 'adminController@hapus_blog');
// page
Route::get('admin/page/kontak', 'adminController@page_kontak');

// post
Route::post('admin/users/tambah/proses', 'adminController@tambah_user_proses');
Route::post('admin/spot/kategori/tambah/proses', 'adminController@tambah_kategori_spot_proses');
Route::post('admin/blog/kategori/tambah/proses', 'adminController@tambah_kategori_blog_proses');
Route::post('admin/provinsi/tambah/proses', 'adminController@tambah_provinsi_proses');
Route::post('admin/kota/tambah/proses', 'adminController@tambah_kota_proses');
Route::post('admin/spot/konten/upload', 'adminController@uploadFoto');
Route::post('admin/spot/tambah/proses', 'adminController@tambah_spot_proses');
Route::post('admin/blog/tambah/proses', 'adminController@tambah_blog_proses');
Route::post('admin/spot/galeri/proses/{id}', 'adminController@olah_galeri_proses');
Route::post('admin/spot/galeri/deskripsi/proses/{id}', 'adminController@olah_galeri_deskripsi_proses');
Route::post('admin/page/kontak/proses/{id}', 'adminController@page_kontak_proses');

// put
Route::put('admin/users/edit/proses/{id}', 'adminController@edit_user_proses');
Route::put('admin/spot/kategori/edit/proses/{id}', 'adminController@edit_kategori_spot_proses');
Route::put('admin/blog/kategori/edit/proses/{id}', 'adminController@edit_kategori_blog_proses');
Route::put('admin/provinsi/edit/proses/{id}', 'adminController@edit_provinsi_proses');
Route::put('admin/kota/edit/proses/{id}', 'adminController@edit_kota_proses');
Route::put('admin/spot/edit/proses/{id}', 'adminController@edit_spot_proses');
Route::put('admin/blog/edit/proses/{id}', 'adminController@edit_blog_proses');

// webservice api
// kota
Route::get('api/kota', 'apiController@ApiGetKota');
Route::post('api/get/location', 'apiController@getLogation');
Route::post('api/kota/{id}', 'apiController@ApiGetKotaById');
Route::post('api/image/cropped', 'apiController@uploadImgHeader');
Route::post('api/image/blog', 'apiController@uploadImgBlog');
Route::post('api/send_whatsapp', 'apiController@sendWhatsapp');
Route::get('watsappCoba', 'userController@trySend');
Route::post('api/emailKirapac', 'apiController@sendEmailKirapac');
// end webservice api

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('key:generate');
    // $exitCode = Artisan::call('config:clear');
    // $exitCode = Artisan::call('cache:clear');
    // $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Auth::routes();
