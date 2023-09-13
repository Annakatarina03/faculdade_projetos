<?php

use App\Http\Controllers\ProfileController;
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

/* Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * Employees routes
 * @author Rafael Henrique
 */

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/{employee}', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::post('/employees/create', [EmployeeController::class, 'store'])->name('employees.store');
Route::put('/employees/edit/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

/**
 * Restaurants routes
 * @author Rafael Henrique
 */

Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');
Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'edit'])->name('restaurants.edit');
Route::post('/restaurants/create', [RestaurantController::class, 'store'])->name('restaurants.store');
Route::put('/restaurants/edit/{restaurant}', [RestaurantController::class, 'update'])->name('restaurants.update');
Route::delete('/restaurants/{restaurant}', [RestaurantController::class, 'destroy'])->name('restaurants.destroy');


require __DIR__ . '/auth.php';
