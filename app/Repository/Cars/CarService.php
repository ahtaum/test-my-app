<?php

namespace App\Repository\Cars;

use App\Models\Car;

class CarService implements CarServiceInterface {
    public function getAllCars() {
        try {
            $cars = Car::all();
            
            return $cars;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getCar($id) {
        try {
            $car = Car::findOrFail($id);
            
            return $car;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function createCar(array $data) {
        try {
            $car = new Car();
            $car->machine = $data['machine'];
            $car->capacity = $data['capacity'];
            $car->type = $data['type'];
            $car->save();
            
            return $car;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function updateCar(array $data, $id) {
        try {
            $car = Car::findOrFail($id);
            $car->machine = $data['machine'];
            $car->capacity = $data['capacity'];
            $car->type = $data['type'];
            $car->save();
            
            return $car;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function deleteCar($id) {
        try {
            $car = Car::findOrFail($id);
            $car->delete();
            
            return true;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}