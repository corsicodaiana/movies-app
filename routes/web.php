<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use Presentation\http\Actions\ObtenerDatosPeliculasAction;
use Presentation\http\Actions\ListaPeliculasValidasAction;
use Presentation\http\Actions\EditarPeliculaAction;
use Presentation\http\Actions\EliminarPeliculaAction;


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
    return view('welcome');
});


Route::get('/obtenerDatosPeliculas', [ObtenerDatosPeliculasAction::class, 'execute']);
Route::get('/listaPeliculasValidas', [ListaPeliculasValidasAction::class, 'execute']);
Route::post('/editarPelicula', [EditarPeliculaAction::class, 'execute']);
Route::post('/eliminarPelicula', [EliminarPeliculaAction::class, 'execute']);