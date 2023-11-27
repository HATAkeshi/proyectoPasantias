<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
//rol
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlquilerAndamiosFormController;
use App\Http\Controllers\ConstructoraFormController;
use App\Http\Controllers\CursosFormController;


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
//redireccionamos directo al login
Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => [\Illuminate\Auth\Middleware\Authorize::using('publish articles')]], function () {
    //agreagamos los controladores 
    //roles
    Route::resource('roles', RolController::class);
    //usuarios
    Route::resource('usuarios', RolController::class);
    //cursos
    Route::get('frm_cursos', [CursosFormController::class, 'index'])->name('frm_cursos');
    //contructora ludeño
    Route::get('frm_constructora', [ConstructoraFormController::class, 'index'])->name('frm_constructora');
    //alquiler de andamios
    Route::get('frm_alquiler_andamios', [AlquilerAndamiosFormController::class, 'index'])->name('frm_alquiler_andamios');
});

Route::get('home', [HomeController::class, 'index']);
