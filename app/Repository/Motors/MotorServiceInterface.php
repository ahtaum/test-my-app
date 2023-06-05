<?php

namespace App\Repository\Motors;

interface MotorServiceInterface {
    public function getAllMotors();
    public function createMotor(array $data);
    public function getMotorById($id);
    public function updateMotor($id, array $data);
    public function deleteMotor($id);
}