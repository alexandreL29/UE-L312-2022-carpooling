<?php

namespace App\Controllers;

use App\Services\CarpoolAdService;

class UsersController
{
    /**
     * Return the html for the create action.
     */
    public function createCarpoolAd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['start_place']) &&
            isset($_POST['destination']) &&
            isset($_POST['departure_time']) &&
            isset($_POST['price'])) {
            // Create the user :
            $carpoolAdService = new CarpoolAdService();
            $isOk = $carpoolAdService->setUser(
                null,
                $_POST['start_place'],
                $_POST['destination'],
                $_POST['departure_time'],
                $_POST['price']
            );
            if ($isOk) {
                $html = 'Annonce créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de l\'annonce.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getCarpoolAd(): string
    {
        $html = '';

        // Get all carpool ad :
        $carpoolAdService = new CarpoolAdService();
        $carpoolAd = $carpoolAdService->getCarpoolAd();

        // Get html :
        foreach ($carpoolAd as $ad) {
            $html .=
                '#' . $ad->getId() . ' ' .
                $ad->getStartPlace() . ' ' .
                $ad->getDestination() . ' ' .
                $ad->getDepartureTime()->format('d-hh:mm') . ' ' .
                $ad->getPrice() . '<br />';
        }

        return $html;
    }

    /**
     * Update the carpool ad.
     */
    public function updateCarpoolAd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['start_place']) &&
            isset($_POST['destination']) &&
            isset($_POST['departure_time']) &&
            isset($_POST['price'])) {
            // Update the carpool ad :
            $carpoolAdService = new CarpoolAdService();
            $isOk = $carpoolAdService->setCarpoolAd(
                $_POST['id'],
                $_POST['start_place'],
                $_POST['destination'],
                $_POST['departure_time'],
                $_POST['price']
            );
            if ($isOk) {
                $html = 'Annonce mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de l\'annonce.';
            }
        }

        return $html;
    }

    /**
     * Delete an carpool ad.
     */
    public function deleteCarpoolAd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the carpool ad :
            $carpoolAdService = new CarpoolAdService();
            $isOk = $carpoolAdService->deleteCarpoolAd($_POST['id']);
            if ($isOk) {
                $html = 'Annonce supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de l\'annonce.';
            }
        }

        return $html;
    }
}
