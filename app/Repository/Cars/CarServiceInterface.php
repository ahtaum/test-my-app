<?php

namespace App\Repository\Cars;

interface CarServiceInterface {
    public function getAllCars();
    public function getCar($id);
    public function createCar(array $data);
    public function updateCar(array $data, $id);
    public function deleteCar($id);
}