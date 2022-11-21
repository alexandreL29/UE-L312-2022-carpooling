<?php

namespace App\Controllers;

use App\Services\BookingsService;

class BookingsController
{
    /**
     * Return the html for the create action.
     */
    public function createBooking(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['day']) &&
            isset($_POST['horary']) &&
            isset($_POST['number'])) {
            // Create the booking :
            $bookingsService = new BookingsService();
            $isOk = $bookingsService->setBooking(
                null,
                $_POST['day'],
                $_POST['horary'],
                $_POST['number'],
            );
            if ($isOk) {
                $html = 'Réservation créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de la résevation.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getBookings(): string
    {
        $html = '';

        // Get all booking :
        $bookingsService = new BookingsService();
        $bookings = $bookingsService->getBookings();

        // Get html :
        foreach ($bookings as $booking) {
            $html .=
                '#' . $booking->getId() . ' ' .
                $booking->getDay()->format('d-m-Y') . ' ' .
                $booking->getHorary()->format('hh:mm') . ' ' .
                $booking->getNumber() . ' ' .  '<br />';
        }

        return $html;
    }

    /**
     * Update the booking.
     */
    public function updateBookings(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['day']) &&
            isset($_POST['horary']) &&
            isset($_POST['number'])) {
            // Update the booking :
            $bookingsService = new BookingsService();
            $isOk = $bookingsService->setBookings(
                $_POST['id'],
                $_POST['day'],
                $_POST['horary'],
                $_POST['number']
            );
            if ($isOk) {
                $html = 'Réservation mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de la réservation.';
            }
        }

        return $html;
    }

    /**
     * Delete an booking.
     */
    public function deleteBookings(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the booking :
            $bookingsService = new BookingsService();
            $isOk = $bookingsService->deleteBookings($_POST['id']);
            if ($isOk) {
                $html = 'Réservation supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la réservation.';
            }
        }

        return $html;
    }
}
