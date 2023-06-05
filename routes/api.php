<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;

Route::controller(UserController::class)->prefix("users")->group(function () {
    Route::get("/", "getUsers");
    Route::get("/{id}", "getUser");

    Route::post("/login", "login");
    Route::post("/logout", "logout")->middleware("custom.auth");

    Route::post("/add", "addUser");
    Route::put("/edit/{id}", "updateUser");
    Route::delete("/delete/{id}", "deleteUser");
});

Route::middleware('custom.auth')->group(function () {
    Route::controller(VehicleController::class)->prefix("vehicles")->group(function () {
        Route::get("/", "getVehicles");
    
        Route::delete("/sold/{id}", "sold");
    });
});