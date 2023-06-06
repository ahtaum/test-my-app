<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Vehicles\VehicleServiceInterface;

class VehicleController extends Controller
{
    protected $vehicleService;

    public function __construct(VehicleServiceInterface $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    public function getVehicles() {
        return $this->vehicleService->getVehicles();
    }

    public function addVehicle(Request $request) {
        return $this->vehicleService->addVehicle($request);
    }        

    public function sold($id) {
        return $this->vehicleService->sold($id);
    }

    public function generateReport() {
        return $this->vehicleService->generateReport();
    }
}
