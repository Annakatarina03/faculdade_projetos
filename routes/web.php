<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MeasureController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\RestaurantController;
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

    /**
     * Employees routes
     * @author Rafael Henrique
     */

    Route::get('/admin/employees', [EmployeeController::class, 'index'])->name('admin.employees.index');

    /**
     * Restaurants routes
     * @author Rafael Henrique
     */

    Route::get('/admin/restaurants', [RestaurantController::class, 'index'])->name('admin.restaurants.index');

    /**
     * Measures routes
     * @author Rafael Henrique
     */

    Route::get('/admin/measures', [MeasureController::class, 'index'])->name('admin.measures.index');

    /**
     * Ingredients routes
     * @author Rafael Henrique
     */

    Route::get('/admin/ingredients', [IngredientController::class, 'index'])->name('admin.ingredients.index');

    /**
     * Positions routes
     * @author Rafael Henrique
     */

    Route::get('/admin/positions', [OfficeController::class, 'index'])->name('admin.positions.index');

    /**
     * Categories routes
     * @author Rafael Henrique
     */

    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');

    Route::get('/profile', function () {
        return view('senac.employee.profile');
    })->name('profile');
});

require __DIR__ . '/auth.php';
