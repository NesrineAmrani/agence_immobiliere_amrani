<?php

use App\Http\Controllers\AppartementController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CitySectorController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FermaController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\IntermediaireController;
use App\Http\Controllers\LocalCommercialController;
use App\Http\Controllers\MaisonController;
use App\Http\Controllers\TerrainController;
use App\Http\Controllers\VillaController;
use App\Models\City;
use App\Models\Maison;


use Illuminate\Support\Facades\Route;

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

Route::redirect('/', 'login');

Route::middleware(['auth'])->group(function () {
   // Route::get('/dashboard', function () {
    //    return view('dashboard');
    //})->name('dashboard');






    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('client', ClientController::class);
    Route::post('client/search', [ClientController::class, 'search'])->name('client.search');
    Route::post('client/filter', [ClientController::class, 'filter'])->name('client.filter');

    Route::resource('intermediaire', IntermediaireController::class);
    Route::post('intermediaire/filter', [IntermediaireController::class, 'filter'])->name('intermediaire.filter');

    Route::resource('appartement', AppartementController::class);
    Route::post('appartement/filter', [AppartementController::class, 'filter'])->name('appartement.filter');

    Route::resource('terrain', TerrainController::class);
    Route::post('terrain/filter', [TerrainController::class, 'filter'])->name('terrain.filter');

    Route::resource('lc', LocalCommercialController::class);
    Route::post('lc/filter', [LocalCommercialController::class, 'filter'])->name('lc.filter');

    Route::resource('maison', MaisonController::class);
    Route::post('maison/filter', [MaisonController::class, 'filter'])->name('maison.filter');

    Route::resource('villa', VillaController::class);
    Route::post('villa/filter', [VillaController::class, 'filter'])->name('villa.filter');

    Route::resource('ferma', FermaController::class);
    Route::post('ferma/filter', [FermaController::class, 'filter'])->name('ferma.filter');

    Route::get('/dashboard/totals', [DashboardController::class, 'getTotals'])->name('dashboard.totals');
    Route::get('/dashboard/cityCounter', [DashboardController::class, 'cityCounter'])->name('dashboard.cityCounter');
    Route::get('/dashboard/topTenCitySectors', [DashboardController::class, 'topTenCitySectors'])->name('dashboard.topTenCitySectors');

    Route::post('file/upload', [FileUploadController::class, 'upload'])->name('file.upload');
    Route::post('file/read', [FileUploadController::class, 'getFiles'])->name('file.read');
    Route::post('file/destroy', [FileUploadController::class, 'destroy'])->name('file.destroy');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');

    Route::get('/parameters', function () {
        return view('amrani.pages.parameters.index')->with(['cities' => City::all()]);
    })->name('params');

    Route::get('parameters/city/create', [CityController::class, 'create'])->name('city.create');

    Route::get('/city/sectors/{id_city}', [CitySectorController::class, 'getByCity'])->name('sectors.list');
    Route::delete('/city/destroy/{city}', [CityController::class, 'destroy'])->name('city.destroy');
    Route::put('/city/update/{city}', [CityController::class, 'update'])->name('city.update');
    Route::post('/city/create/', [CityController::class, 'create'])->name('city.create');

    Route::delete('/city/sector/destroy/{sector}', [CitySectorController::class, 'destroy'])->name('city.sector.destroy');
    Route::put('/city/sector/update/{sector}', [CitySectorController::class, 'update'])->name('city.sector.update');
    Route::post('/city/sector/create/', [CitySectorController::class, 'create'])->name('city.sector.create');
    Route::post('/city/sector/get/last/', [CitySectorController::class, 'lastSector'])->name('city.sector.last');

    Route::get('/log', [DashboardController::class, 'activity'])->name('activity.log');









});

require __DIR__.'/auth.php';
