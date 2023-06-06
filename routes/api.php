<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\MotorController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;

Route::controller(UserController::class)->prefix("users")->group(function () {
    Route::get("/", "getUsers");
    Route::get("/{id}", "getUser");

    Route::post("/login", "login");

    Route::middleware('custom.auth')->group(function () {
        Route::post("/logout", "logout");
    
        Route::post("/add", "addUser");
        Route::put("/edit/{id}", "updateUser");
        Route::delete("/delete/{id}", "deleteUser");
    });
});

Route::middleware('custom.auth')->group(function () {
    Route::controller(VehicleController::class)->prefix("vehicles")->group(function () {
        Route::get("/", "getVehicles");
        Route::get("/reports", "generateReport");
        
        Route::post("/add", "addVehicle");
        Route::delete("/sold/{id}", "sold");
    });

    Route::controller(CarController::class)->prefix("cars")->group(function () {
        Route::get("/", "getCars");
        Route::get("/{id}", "getCar");
        Route::post("/add", "addCar");
        Route::put("/update/{id}", "updateCar");
        Route::delete("/delete/{id}", "deleteCar");
    });

    Route::controller(MotorController::class)->prefix("motors")->group(function () {
        Route::get("/", "getMotors");
        Route::get("/{id}", "getMotor");
        Route::post("/add", "addMotor");
        Route::put("/update/{id}", "updateMotor");
        Route::delete("/delete/{id}", "deleteMotor");
    });
});