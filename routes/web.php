<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/', function () {
    return view('plantillainicio');
})->name('plantillainicio');


Route::get('/acercade', function () {
    return view('acercade');
})->name('acercade');

Route::get('/contactanos', function () {
    return view('contactanos');
})->name('contactanos');

Route::get('/ayuda', function () {
    return view('ayuda');
})->name('ayuda');

Route::get('/ayuda', function () {
    return view('ayuda');
})->name('ayuda');

Route::get('/periodos', function () {
    return view('periodos');
})->name('periodos');

Route::get('/plazas', function () {
    return view('plazas');
})->name('plazas');

Route::get('/puestos', function () {
    return view('puestos');
})->name('puestos');

Route::get('/personal', function () {
    return view('personal');
})->name('personal');

Route::get('/deptos', function () {
    return view('deptos');
})->name('deptos');

Route::get('/carreras', function () {
    return view('carreras');
})->name('carreras');

Route::get('/reticulas', function () {
    return view('reticulas');
})->name('reticulas');

Route::get('/materias', function () {
    return view('materias');
})->name('materias');

Route::get('/alumnos', function () {
    return view('alumnos');
})->name('alumnos');

Route::get('/docentes', function () {
    return view('docentes');
})->name('docentes');

Route::get('/alumnosh', function () {
    return view('alumnosh');
})->name('alumnosh');

Route::get('/capacitacion', function () {
    return view('capacitacion');
})->name('capacitacion');

Route::get('/asesorias', function () {
    return view('asesorias');
})->name('asesorias');

Route::get('/proyectos', function () {
    return view('proyectos');
})->name('proyectos');

Route::get('/materiald', function () {
    return view('materiald');
})->name('materiald');

Route::get('/docencia', function () {
    return view('docencia');
})->name('docencia');

Route::get('/asesoriaext', function () {
    return view('asesoriaext');
})->name('asesoriaext');

Route::get('/asesoriass', function () {
    return view('asesoriass');
})->name('asesoriass');

Route::get('/instrumentacion', function () {
    return view('instrumentacion');
})->name('instrumentacion');

Route::get('/tutorias', function () {
    return view('tutorias');
})->name('tutorias');

Route::get('/plantilla1', function () {
    return view('plantilla1');
})->middleware(['auth', 'verified'])->name('plantilla1');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('plantilla1'); // Asegúrate de tener una vista llamada dashboard.blade.php
    })->name('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
}); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
