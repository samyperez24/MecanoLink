<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\ClienteController;


// =====================
// LOGIN
// =====================

Route::get('/', function () {
    return view('login');
});


Route::post('/login', function (Request $request) {

    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {

        return redirect('/dashboard');

    }

    return back()->with('error', 'Credenciales incorrectas');

});


// =====================
// REGISTRO
// =====================

Route::get('/register', function () {
    return view('register');
});


Route::post('/register', function (Request $request) {

    User::create([

        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)

    ]);


    return redirect('/');

});


// =====================
// DASHBOARD
// =====================

Route::get('/dashboard',
[ClienteController::class, 'index'])
->name('dashboard');



// =====================
// MODULO CLIENTES
// =====================

Route::post('/clientes',
[ClienteController::class, 'store'])
->name('clientes.store');


// Actualizar cliente
Route::put('/clientes/{cliente}',
[ClienteController::class, 'update'])
->name('clientes.update');


// Eliminar cliente
Route::delete('/clientes/{cliente}',
[ClienteController::class, 'destroy'])
->name('clientes.destroy');