<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('main');
});

Route::get('/intranet', function () {
    return view('main');
});

Route::get('/mural', function () {
  return view('main-mural');
});

Route::get('/gestiondeposts', function () {
  return view('publicaciones');
});