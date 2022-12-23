<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\MascotaController;
use App\Http\Controllers\admin\TipoController;
use App\Http\Controllers\admin\RazaController;





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

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('admin/tipo', 'admin\TipoController');
//Route::resource('admin/raza', 'admin\RazaController');
//Route::resource('admin/mascota', 'admin\MascotaController');


Route::resource('admin/mascota', MascotaController::class);
Route::resource('admin/tipo', TipoController::class);
Route::resource('admin/raza', RazaController::class);

Route::get('admin/mostrarpdf', [MascotaController::class,'MostrarMascotaPdf']);
