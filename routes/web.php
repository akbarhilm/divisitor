<?php

use App\Livewire\Dashboard;
use App\Livewire\Home;
use App\Livewire\Incident;
use App\Livewire\IncidentEdit;
use App\Livewire\Resolution;
use App\Mail\Ask;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Livewire\Undangan;
use App\Livewire\Absensi;
use App\Livewire\Tamu;
use App\Livewire\Send;
use App\Livewire\Visitortype;
use App\Livewire\Visitorcategory;

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

Route::group(['middleware' => 'keycloak-web'], function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/undangan', Undangan::class)->name('undangan');
    //Route::get('/send/{id}', Send::class)->name('send');
    Route::get('/referensi-visitortype', Visitortype::class)->name('visitortype');
    Route::get('/referensi-visitorcategory', Visitorcategory::class)->name('visitorcategory');
    Route::get('/absensi', Absensi::class)->name('absensi');
    Route::get('/resolution', Resolution::class)->name('resolution');
    Route::get('/incident', Incident::class)->name('incident');
    Route::get('/incident/{id}/edit', IncidentEdit::class)->name('incident-edit');
    Route::get('/signout', function () {
        session()->forget('user');

        return redirect()->route('keycloak.logout');
    })->name('logout');
    Route::get('/undangan', Undangan::class)->name('undangan');
    Route::get('/tamu/{id}', Tamu::class)->name('tamu');
});

// Route::get('/', Home::class)->name('home');
