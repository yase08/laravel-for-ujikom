<?php

use App\Http\Controllers\UserController;
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

// PUBLIC ROUTE
Route::get('/', function () {
    return view('pages.index');
});

// PROTECTED ROUTE BY LOGIN
Route::middleware("isLogin")->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name("dashboard");

    // PROTECTED ROUTE BY ADMIN
    Route::middleware("isAdmin")->group(function () {
        // GET ROUTE
        Route::get("/dashboard/user", [UserController::class, "index"])->name("user");
        Route::get("/dashboard/user/create", [UserController::class, "create"])->name("user.create");
        Route::get("/dashboard/user/edit/{id}", [UserController::class, "edit"])->name("user.edit");

        //POST ROUTE
        Route::post("/user/store", [UserController::class, "store"])->name("user.store");

        // PATCH ROUTE
        Route::patch("/user/update/{id}", [UserController::class, "update"])->name("user.update");

        //DELETE ROUTE
        Route::delete("/user/delete/{id}", [UserController::class, "destroy"])->name("user.delete");
    });
});

require __DIR__ . '/auth.php';
