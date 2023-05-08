<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('front_liste');
})->name("front_index");

Route::get('/admin', [BackController::class, 'index'])->name("index");
Route::post('/admin/login', [BackController::class, 'login'])->name("login");
Route::get('/admin/ajout', [BackController::class, 'ajout'])->name("ajout");
Route::post('/admin/create', [BackController::class, 'create'])->name("create");
Route::get('/admin/liste', [BackController::class, 'liste'])->name("liste");

Route::get('/admin/edit/{id}', [BackController::class, 'edit'])->name("edit");
Route::post('/admin/modif', [BackController::class, 'modif'])->name("modif");
Route::get('/admin/remove/{id}', [BackController::class, 'remove'])->name("remove");
Route::get('/admin/fiche/{id}', [BackController::class, 'fiche'])->name("fiche");
Route::post('/admin/recherche', [BackController::class, 'recherche'])->name("recherche");


Route::get('/fiche/{id}', [FrontController::class, 'fiche'])->name("front_fiche");
Route::get('/intelligence-artificiel', [FrontController::class, 'liste'])->name("front_liste");
Route::post('/recherche', [FrontController::class, 'recherche'])->name("front_recherche");
Route::get('/{text}', [FrontController::class, 'rech'])->name("front_rech");
