<?php

namespace App\Services;

use App\Entities\Booking;
use DateTime;

class BookingsService
{
    /**
     * Create or update a booking.
     */
    public function setBooking(?string $id, string $day, string $horary, int $number): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createBooking($day, $horary, $number);
        } else {
            $isOk = $dataBaseService->updateBooking($id, $day, $horary, $number);
        }

        return $isOk;
    }

    /**
     * Return all bookings.
     */
    public function getBookings(): array
    {
        $bookings = [];

        $dataBaseService = new DataBaseService();
        $bookingsDTO = $dataBaseService->getBookings();
        if (!empty($bookingsDTO)) {
            foreach ($bookingsDTO as $bookingDTO) {
                $booking = new Booking();
                $booking->setId($bookingDTO['id']);
                $booking->setDay($bookingDTO['day']);
                $booking->setHorary($bookingDTO['horary']);
                $booking->setNumber($bookingDTO['number']);
                $bookings[] = $booking;
            }
        }

        return $bookings;
    }

    /**
     * Delete a booking.
     */
    public function deleteBooking(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteBooking($id);

        return $isOk;
    }
}
