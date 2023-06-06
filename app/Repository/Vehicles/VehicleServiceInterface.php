<?php

namespace App\Repository\Vehicles;

use Illuminate\Http\Request;

interface VehicleServiceInterface {
    public function getVehicles();
    public function addVehicle(Request $request);
    public function sold($id);
    public function generateReport();
}