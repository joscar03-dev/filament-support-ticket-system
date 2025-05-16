<?php

use App\Livewire\CreateTicket;
use App\Livewire\EditTicket;
use App\Livewire\ListTickets;
use App\Models\User;
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

Route::get('/tickets', ListTickets::class)->name('tickets.index');
//ruta para crear tickets
Route::get('/tickets/create', CreateTicket::class)->name('tickets.create');
;
//rta para editar tickets
Route::get('/tickets/{ticket}/edit', EditTicket::class)->name('tickets.edit');
