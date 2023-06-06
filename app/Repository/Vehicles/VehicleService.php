<?php

namespace App\Repository\Vehicles;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleService implements VehicleServiceInterface {
    public function getVehicles() {
        try {
            $vehicles = Vehicle::with("motor", "car")->get();

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'total' => $vehicles->count(),
                'data' => $vehicles
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function addVehicle(Request $request) {
        try {
            $vehicle = new Vehicle();
            $vehicle->year = $request->year;
            $vehicle->color = $request->color;
            $vehicle->price = $request->price;
            $vehicle->save();
    
            if ($request->type === 'motor') {
                $motorData = [
                    'machine' => $request->machine,
                    'suspension_type' => $request->suspension_type,
                    'transmision_type' => $request->transmision_type
                ];
    
                $motor = $vehicle->motor()->create($motorData);
                $vehicle->sales()->create(['sale_date' => null]);
    
                return response()->json([
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Motor added successfully',
                    'data' => [
                        'vehicle' => $vehicle,
                        'motor' => $motor
                    ]
                ]);
            } elseif ($request->type === 'car') {
                $carData = [
                    'machine' => $request->machine,
                    'capacity' => $request->capacity,
                    'type' => $request->car_type
                ];
    
                $car = $vehicle->car()->create($carData);
                $vehicle->sales()->create(['sale_date' => null]);
    
                return response()->json([
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Car added successfully',
                    'data' => [
                        'vehicle' => $vehicle,
                        'car' => $car
                    ]
                ]);
            }
    
            return response()->json([
                'code' => 400,
                'status' => 'error',
                'message' => 'Invalid vehicle type'
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }        

    public function sold($id) {
        try {
            $vehicle = Vehicle::find($id);
            
            if ($vehicle) {
                $vehicle->motor()->delete();
                $vehicle->car()->delete();
                $vehicle->sales()->delete();
                $vehicle->delete();
            } else {
                return response()->json([
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'Vehicle not found'
                ], 404);
            }
            
            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'Vehicle sold out!',
                'total' => 1
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function generateReport() {
        try {
            $vehicles = Vehicle::all();
            $report = [];
    
            foreach ($vehicles as $vehicle) {
                $sales = $vehicle->sales;
                $vehicleData = [
                    'id' => $vehicle->id,
                    'year' => $vehicle->year,
                    'color' => $vehicle->color,
                    'price' => $vehicle->price,
                    'sales_count' => $sales->count(),
                    'total_sales' => $sales->sum('sale_date')
                ];
    
                if ($vehicle->car) {
                    $vehicleData['type'] = 'Car';
                    $vehicleData['machine'] = $vehicle->car->machine;
                    $vehicleData['capacity'] = $vehicle->car->capacity;
                    $vehicleData['car_type'] = $vehicle->car->type;
                } elseif ($vehicle->motor) {
                    $vehicleData['type'] = 'Motor';
                    $vehicleData['machine'] = $vehicle->motor->machine;
                    $vehicleData['suspension_type'] = $vehicle->motor->suspension_type;
                    $vehicleData['transmission_type'] = $vehicle->motor->transmission_type;
                }
    
                $report[] = $vehicleData;
            }
    
            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'Report generated successfully',
                'data' => $report
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}