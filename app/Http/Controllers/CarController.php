<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCarRequest;
use App\Repository\Cars\CarServiceInterface;

class CarController extends Controller
{
    private $carService;

    public function __construct(CarServiceInterface $carService) {
        $this->carService = $carService;
    }

    public function getCars() {
        try {
            $cars = $this->carService->getAllCars();

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'total' => count($cars),
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
            $car = $this->carService->getCar($id);

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
            $data = $request->validated();
            $car = $this->carService->createCar($data);

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
            $data = $request->validated();
            $car = $this->carService->updateCar($data, $id);

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
            $result = $this->carService->deleteCar($id);

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'Car deleted successfully',
                'result_deleted_data' => $result
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
