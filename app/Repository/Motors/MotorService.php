<?php

namespace App\Repository\Motors;

use App\Models\Motor;

class MotorService implements MotorServiceInterface {
    public function getAllMotors()
    {
        return Motor::all();
    }

    public function createMotor(array $data)
    {
        return Motor::create($data);
    }

    public function getMotorById($id)
    {
        return Motor::findOrFail($id);
    }

    public function updateMotor($id, array $data)
    {
        $motor = Motor::findOrFail($id);
        $motor->update($data);
        return $motor;
    }

    public function deleteMotor($id)
    {
        $motor = Motor::findOrFail($id);
        $motor->delete();
    }
}