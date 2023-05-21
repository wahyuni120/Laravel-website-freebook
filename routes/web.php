<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function(){return view('view_home');});

Route::get('/buku', 'BukuController@bukutampil');
Route::post('/buku/tambah','BukuController@bukutambah');
Route::get('/buku/hapus/{id_buku}','BukuController@bukuhapus');
Route::put('/buku/edit/{id_buku}', 'BukuController@bukuedit');


Route::get('/user', 'UserController@usertampil');
Route::post('/user/tambah', 'UserController@usertambah');
Route::get('/user/hapus/{id_user}', 'UserController@userhapus');
Route::put('/user/edit/{id_user}', 'UserController@useredit');

Route::get('/admin', 'AdminController@admintampil');
Route::post('/admin/tambah', 'AdminController@admintambah');
Route::get('/admin/hapus/{id_admin}', 'AdminController@adminhapus');
Route::put('/admin/edit/{id_admin}', 'AdminController@adminedit');


