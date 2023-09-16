<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/admin/employees', [EmployeeController::class, 'index'])->name('admin.employees.index');
Route::get('/admin/employees/{employee}', [EmployeeController::class, 'edit'])->name('admin.employees.edit');
Route::post('/admin/employees/create', [EmployeeController::class, 'store'])->name('admin.employees.store');
Route::put('/admin/employees/edit/{employee}', [EmployeeController::class, 'update'])->name('admin.employees.update');
Route::delete('/admin/employees/{employee}', [EmployeeController::class, 'destroy'])->name('admin.employees.destroy');

/**
 * Restaurants routes
 * @author Rafael Henrique
 */

Route::get('/admin/restaurants', [RestaurantController::class, 'index'])->name('admin.restaurants.index');
Route::get('/admin/restaurants/{restaurant}', [RestaurantController::class, 'edit'])->name('admin.restaurants.edit');
Route::post('/admin/restaurants/create', [RestaurantController::class, 'store'])->name('admin.restaurants.store');
Route::put('/admin/restaurants/edit/{restaurant}', [RestaurantController::class, 'update'])->name('admin.restaurants.update');
Route::delete('/admin/restaurants/{restaurant}', [RestaurantController::class, 'destroy'])->name('admin.restaurants.destroy');


require __DIR__ . '/auth.php';
