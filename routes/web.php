<?php

use App\Http\Controllers\ChauffeurController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ItineraireController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [UserController::class, 'index'])->name('premiere');

Route::get('/acceuil', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('acceuil');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/passager', [ClientController::class, 'index'])->name('passagers.index');
});
Route::get('/apropos', [UserController::class, 'apropos'])->name('apropos');
Route::get('/comptechauf', [ChauffeurController::class, 'form'])->name('compte.chauffeur');
Route::post('/comptechauf', [ChauffeurController::class, 'store'])->name('compte.storec');
Route::get('/comptepasse', [ClientController::class, 'form'])->name('compte.passager');
Route::post('/comptepasse', [ClientController::class, 'store'])->name('compte.storep');

// route admin
Route::get('/administration', [UserController::class, 'administration'])->name('administration');
Route::post('/administration', [UserController::class, 'enregistrement'])->name('enregistrer_itineraire');
// pass
Route::get('/passager', [ClientController::class, 'index'])->name('passagers.index');
// chauf
Route::get('/chauffeur', [ChauffeurController::class, 'index'])->name('chauffeur.index');
Route::post('/chauffeur', [ChauffeurController::class, 'store'])->name('chauffeur.store');
// itineraire
Route::get('/itineraire', [ItineraireController::class, 'index'])->name('itineraire.index');
Route::get('/itineraire', [ItineraireController::class, 'from'])->name('itineraire.form');
Route::post('/itineraire', [ItineraireController::class, 'store'])->name('itineraire.store');

// route client
Route::group(['middleware' => ['auth', 'role:client']], function () {
    // Route::get('/passager', [ClientController::class, 'index'])->name('passagers.index');
    // Route::get('/passager', [ClientController::class, 'from'])->name('passagers.form');
    // Route::patch('/passager', [ClientController::class, 'connect'])->name('passagers.connect');
    Route::post('/passager', [ClientController::class, 'store'])->name('passagers.store');
});
// route chauffeur
Route::group(['middleware' => ['auth', 'role:chauffeur']], function () {
    // Route::get('/chauffeur', [ChauffeurController::class, 'index'])->name('chauffeur.index');
    // Route::get('/chauffeur', [ChauffeurController::class, 'from'])->name('chauffeur.form');
    // Route::patch('/chauffeur', [ChauffeurController::class, 'connect'])->name('chauffeur.connect');
    Route::post('/chauffeur', [ChauffeurController::class, 'store'])->name('chauffeur.store');
});

require __DIR__ . '/auth.php';
