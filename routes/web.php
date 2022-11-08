<?php

use App\Http\Controllers\ChirpController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'name' => 'John Samuel',

    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/users', function (Request $request) {


//     $users = User::query()
//         ->when(Request::query('search'), function ($query, $search) {
//             return $query->where('name', 'like', '%' . $search . '%');
//         })
//         ->paginate(10)
//         ->withQueryString()
//         ->through(fn ($user) => [
//             'id' => $user->id,
//             'name' => $user->name,
//             'email' => $user->email,

//         ]);



//     return Inertia::render('Users', [
//         'users' => $users,
//         'filters' => Request::only('search'),

//     ]);
// })->middleware(['auth', 'verified'])->name('users');

Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::get('/hygraph', function () {
    return Inertia::render('Hygraph');
})->middleware(['auth', 'verified'])->name('hygraph');

Route::get('/stripe', function () {
    return Inertia::render('Stripe', [
        'intent' => auth()->user()->createSetupIntent()
    ]);
})->middleware(['auth', 'verified'])->name('stripe');












require __DIR__ . '/auth.php';
