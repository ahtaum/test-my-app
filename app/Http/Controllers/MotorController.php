<?php

namespace App\Http\Controllers;

use App\Http\Requests\MotorRequest;
use App\Repository\Motors\MotorServiceInterface;

class MotorController extends Controller
{
    private $motorService;

    public function __construct(MotorServiceInterface $motorService) {
        $this->motorService = $motorService;
    }

    public function getMotors() {
        try {
            $motors = $this->motorService->getAllMotors();

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'total' => $motors->count(),
                'data' => $motors
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getMotor($id) {
        try {
            $motor = $this->motorService->getMotorById($id);

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'data' => $motor
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function addMotor(MotorRequest $request) {
        try {
            $data = $request->validated();
            $motor = $this->motorService->createMotor($data);

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'Motor added successfully',
                'data' => $motor
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function updateMotor(MotorRequest $request, $id) {
        try {
            $data = $request->validated();
            $motor = $this->motorService->updateMotor($id, $data);

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'Motor updated successfully',
                'data' => $motor
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteMotor($id) {
        try {
            $this->motorService->deleteMotor($id);

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'Motor deleted successfully'
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
