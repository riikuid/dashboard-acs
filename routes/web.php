<?php

use App\Livewire\Pages\Dashboard\Index;
use App\Livewire\Pages\Dashboard\Person;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::view('/', 'welcome');

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::get('/', Index::class)->name('index');

        Route::middleware(['admin'])->group(function () {
            Route::name('person.')->prefix('person')->group(function () {
                Route::get('/', App\Livewire\Pages\Dashboard\Person\Index::class)->name('index');
                Route::get('create', App\Livewire\Pages\Dashboard\Person\Create::class)->name('create');
            });
            Route::name('access-control.')->prefix('access-control')->group(function () {
                Route::get('/', App\Livewire\Pages\Dashboard\AccessControl\Index::class)->name('index');
                // Route::get('create', App\Livewire\Pages\Dashboard\Person\Create::class)->name('create');
            });
        });
    });
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/admin-test', function () {
    return 'You are an admin';
})->middleware('admin');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');



require __DIR__ . '/auth.php';
