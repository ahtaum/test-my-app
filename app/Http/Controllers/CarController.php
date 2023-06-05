<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AddCarRequest;
use App\Models\Car;

class CarController extends Controller
{
    public function getCars() {
        try {
            $cars = Car::all();

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'total' => $cars->count(),
                'data' => $cars
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getCar($id) {
        try {
            $car = Car::findOrFail($id);

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'data' => $car
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function addCar(AddCarRequest $request) {
        try {
            $car = new Car();
            $car->machine = $request->machine;
            $car->capacity = $request->capacity;
            $car->type = $request->type;
            $car->save();

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'Car added successfully',
                'data' => $car
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function updateCar(AddCarRequest $request, $id) {
        try {
            $car = Car::findOrFail($id);
            $car->machine = $request->machine;
            $car->capacity = $request->capacity;
            $car->type = $request->type;
            $car->save();

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'Car updated successfully',
                'data' => $car
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteCar($id) {
        try {
            $car = Car::findOrFail($id);
            $car->delete();

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'Car deleted successfully'
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
