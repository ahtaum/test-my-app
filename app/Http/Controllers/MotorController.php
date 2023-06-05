<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\MotorRequest;
use App\Models\Motor;

class MotorController extends Controller
{
    public function getMotors() {
        try {
            $motors = Motor::all();

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
            $motor = Motor::findOrFail($id);

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
            $motor = new Motor();
            $motor->machine = $request->machine;
            $motor->suspension_type = $request->suspension_type;
            $motor->transmision_type = $request->transmision_type;
            $motor->save();

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
            $motor = Motor::findOrFail($id);
            $motor->machine = $request->machine;
            $motor->suspension_type = $request->suspension_type;
            $motor->transmision_type = $request->transmision_type;
            $motor->save();

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
            $motor = Motor::findOrFail($id);
            $motor->delete();

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
