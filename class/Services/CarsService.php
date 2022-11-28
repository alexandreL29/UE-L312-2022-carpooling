<?php

namespace App\Services;

use App\Entities\Car;
use DateTime;

class CarsService
{
    /**
     * Create or update a car.
     */
    public function setCar(string $id, string $license_plate, string $color, int $cost, int $nb_seat): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createCar($license_plate, $color, $cost, $nb_seat);
        } else {
            $isOk = $dataBaseService->updateCar($id, $license_plate, $color, $cost, $nb_seat);
        }

        return $isOk;
    }

    /**
     * Return all cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $dataBaseService = new DataBaseService();
        $carsDTO = $dataBaseService->getCars();
        if (!empty($carsDTO)) {
            foreach ($carsDTO as $carDTO) {
                $car = new Car();
                $car->setId($carDTO['id']);
                $car->setLicensePlate($carDTO['license_plate']);
                $car->setColor($carDTO['color']);
                $car->setCost($carDTO['cost']);
                $car->setNbSeat($carDTO['nb_seat']);
                $cars[] = $car;
            }
        }

        return $cars;
    }

    /**
     * Delete a car.
     */
    public function deleteCar(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteCar($id);

        return $isOk;
    }
}
