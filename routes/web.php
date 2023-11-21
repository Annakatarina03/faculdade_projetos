<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CookBookController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MeasureController;
use App\Http\Controllers\MyCookBookController;
use App\Http\Controllers\MyPublicationController;
use App\Http\Controllers\MyRevenueController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RecipeTastingController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\TastingController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    /**
     * Employees routes
     */

    Route::get('/admin/employees', [EmployeeController::class, 'index'])
        ->middleware(['role:administrador'])
        ->name('admin.employees.index');

    /**
     * Restaurants routes
     */

    Route::get('/admin/restaurants', [RestaurantController::class, 'index'])
        ->middleware(['role:administrador'])
        ->name('admin.restaurants.index');

    /**
     * Measures routes
     */

    Route::get('/admin/measures', [MeasureController::class, 'index'])
        ->middleware(['role:administrador'])
        ->name('admin.measures.index');

    /**
     * Ingredients routes
     */

    Route::get('/admin/ingredients', [IngredientController::class, 'index'])
        ->middleware(['role:administrador'])
        ->name('admin.ingredients.index');

    /**
     * Positions routes
     */

    Route::get('/admin/positions', [OfficeController::class, 'index'])
        ->middleware(['role:administrador'])
        ->name('admin.positions.index');

    /**
     * Categories routes
     */

    Route::get('/admin/categories', [CategoryController::class, 'index'])
        ->middleware(['role:administrador'])
        ->name('admin.categories.index');

    /**
     * Profile route
     */

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    /**
     * Tasting routes
     */

    Route::get('/tasting/revenues/my-tasting', [TastingController::class, 'index'])
        ->middleware(['role:degustador|administrador'])
        ->name('tasting.revenues-my-tasting');

    Route::get('/tasting/revenues/schedule-tasting', [RecipeTastingController::class, 'index'])
        ->middleware(['role:degustador|administrador'])
        ->name('tasting.revenues-schedule-tasting');


    /**
     * Revenues routes
     */

    Route::get('/revenues/all-revenues', [RevenueController::class, 'index'])
        ->middleware(['role:chefe-de-cozinha|degustador|editor|administrador'])
        ->name('revenues.all-revenues');

    Route::get('/revenues/my-revenues', [MyRevenueController::class, 'index'])
        ->middleware(['role:chefe-de-cozinha|administrador'])
        ->name('revenues.my-revenues');

    /**
     * Cookbooks routes
     */

    Route::get('/cookbooks/my-cookbooks', [MyCookBookController::class, 'index'])
        ->middleware(['role:editor|administrador'])
        ->name('cookbooks.my-cookbooks');

    Route::get('/cookbooks/all-cookbooks', [CookBookController::class, 'index'])
        ->middleware(['role:editor|chefe-de-cozinha|degustador|administrador'])
        ->name('cookbooks.all-cookbooks');

    /**
     * Publication routes
     */

    Route::get('/publications/my-publications/cookbooks', [MyPublicationController::class, 'index'])
        ->middleware(['role:editor|administrador'])
        ->name('publications.my-publications.cookbooks');

    Route::get('/publications/all-publications/cookbooks', [PublicationController::class, 'index'])->name('publications.all-publications.cookbooks');

    Route::get('/publications/publish/cookbooks', [PublishController::class, 'index'])->name('publications.publish.cookbooks');
    Route::get('/publications/publish/cookbooks/{cookbook}', [PublishController::class, 'create'])
        ->middleware(['role:editor|administrador'])
        ->name('publications.publish.cookbooks-create');

    Route::post('/publications/publish/cookbooks/{cookbook}', [PublishController::class, 'store'])
        ->middleware(['role:editor|administrador'])
        ->name('publications.publish.cookbooks-store');

    Route::get('/publications/publish/cookbook/{cookbook}', [PublishController::class, 'show'])->name('publications.publish.cookbooks-show');

    Route::get('/publications/publish/cookbooks/edit/{cookbook}', [PublishController::class, 'edit'])
        ->middleware(['role:editor|administrador'])
        ->name('publications.publish.cookbooks-edit');

    Route::put('/publications/publish/cookbooks/{cookbook}', [PublishController::class, 'update'])
        ->middleware(['role:editor|administrador'])
        ->name('publications.publish.cookbooks-update');

    Route::get('/publications/publish/cookbook/pdf/{cookbook}', [PublicationController::class, 'show'])->name('publications.cookbooks-pdf');

    // Route::get('/system');
});



require __DIR__ . '/auth.php';
