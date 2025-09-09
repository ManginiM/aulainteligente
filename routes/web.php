<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;

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
    return redirect()->route('login');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
use App\Http\Controllers\UserController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\AireAcondicionadoController;
use App\Http\Controllers\CortinaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DisponibilidadController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\FocoController;
use App\Http\Controllers\HistorialFocoController;
use App\Http\Controllers\HistorialUsoAireAcondicionadoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\MuebleController;
use App\Http\Controllers\ReservaController;


Route::view('/home', 'home');  

Route::get('/debug', function() {
    return view('debug');
});
Route::get('/aulas-emergency', function() {
    return view('aulas.emergency');
});
// RUTAS DE DIAGNÓSTICO - ELIMINAR DESPUÉS
Route::get('/diagnostico/aulas-simple', function() {
    $aulas = DB::table('aulas')->get();
    return view('aulas.emergency', ['aulas' => $aulas]);
});

Route::get('/diagnostico/docentes-simple', function() {
    $docentes = DB::table('docentes')->get();
    return response()->json($docentes); // Devolver como JSON para probar
});

Route::get('/diagnostico/controlador-aulas', [AulaController::class, 'index']);
Route::get('/diagnostico/controlador-docentes', [DocenteController::class, 'index']);

// RUTAS DE DIAGNÓSTICO DIRECTO
Route::get('/debug/aulas-directo', function() {
    $aulas = App\Models\Aula::all();
    return view('debug_aulas', ['aulas' => $aulas]);
});

Route::get('/debug/docentes-directo', function() {
    $docentes = App\Models\Docente::all();
    return view('debug_docentes', ['docentes' => $docentes]);
});

// RUTAS DE DIAGNÓSTICO CON CONTROLADOR
Route::get('/debug/aulas-controller', [AulaController::class, 'index']);
Route::get('/debug/docentes-controller', [DocenteController::class, 'index']);




Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('aulas', AulaController::class);
    Route::resource('aireacondicionado', AireAcondicionadoController::class);
    Route::resource('cortinas', CortinaController::class);
    Route::resource('cursos', CursoController::class);
    Route::resource('disponibilidad', DisponibilidadController::class);
    Route::resource('docentes', DocenteController::class);
    Route::resource('focos', FocoController::class);
    Route::resource('historialfoco', HistorialFocoController::class);
    Route::resource('historialaire', HistorialUsoAireAcondicionadoController::class);
    Route::resource('horarios', HorarioController::class);
    Route::resource('materia', MateriaController::class);
    Route::resource('muebles', MuebleController::class);
    Route::resource('reservas', ReservaController::class);

});