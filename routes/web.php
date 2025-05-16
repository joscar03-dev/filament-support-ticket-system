<?php

use App\Livewire;

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
    //dd(User::find(1)->hasPermiso('crear-categoria'));
    return view('welcome');
});
//ruta para login del usuario
Route::get('/login', Livewire\UserLogin::class)->name('login');

Route::group([
    'middleware' => 'auth',
    'prefix' => 'tickets',
    'as' => 'tickets.',
], function () {
    Route::get('/', Livewire\ListTickets::class)->name('index');
    //ruta para crear tickets
    Route::get('create', Livewire\CreateTicket::class)->name('create');;
    //rta para editar tickets
    Route::get('{ticket}/edit', Livewire\EditTicket::class)->name('edit');
});
