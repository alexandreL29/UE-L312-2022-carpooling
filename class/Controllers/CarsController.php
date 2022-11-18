<?php

namespace App\Controllers;

use App\Services\CarsService;

class CarsController
{
    /**
     * Return the html for the create action.
     */
    public function createCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['license_plate']) &&
            isset($_POST['color']) &&
            isset($_POST['cost']) &&
            isset($_POST['nb_seat'])) {
            // Create the car :
            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                null,
                $_POST['license_plate'],
                $_POST['color'],
                $_POST['cost'],
                $_POST['nb_seat']
            );
            if ($isOk) {
                $html = 'Voiture créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getCars(): string
    {
        $html = '';

        // Get all cars :
        $carsService = new CarsService();
        $cars = $carsService->getCars();

        // Get html :
        foreach ($cars as $car) {
            $html .=
                '#' . $car->getId() . ' ' .
                $car->getLicensePlate() . ' ' .
                $car->getColor() . ' ' .
                $car->getCost() . ' ' .
                $car->getNbSeat() . '<br />';
        }

        return $html;
    }

    /**
     * Update the car.
     */
    public function updateCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['license_plate']) &&
            isset($_POST['color']) &&
            isset($_POST['cost']) &&
            isset($_POST['nb_seat'])) {
            // Update the car :
            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                $_POST['id'],
                $_POST['license_plate'],
                $_POST['color'],
                $_POST['cost'],
                $_POST['nb_seat']
            );
            if ($isOk) {
                $html = 'Voiture mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Delete a car.
     */
    public function deleteCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the car :
            $carsService = new CarsService();
            $isOk = $carsService->deleteCar($_POST['id']);
            if ($isOk) {
                $html = 'Voiture supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la voiture.';
            }
        }

        return $html;
    }
}
