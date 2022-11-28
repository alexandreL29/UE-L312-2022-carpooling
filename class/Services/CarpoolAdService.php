<?php

namespace App\Services;

use App\Entities\CarpoolAd;
use DateTime;

class CarpoolAdService
{
    /**
     * Create or update a carpooll ad.
     */
    public function setCarpoolAd(string $id, string $start_place, string $destination, string $departure_time, int $price): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $departure_timeDateTime = new DateTime($departure_time);
        if (empty($id)) {
            $isOk = $dataBaseService->createCarpoolAd($start_place, $destination, $departure_timeDateTime, $price);
        } else {
            $isOk = $dataBaseService->updateCarpoolAd($id, $start_place, $destination, $departure_timeDateTime, $price);
        }

        return $isOk;
    }

    /**
     * Return all carpool ads.
     */
    public function getCarpoolAds(): array
    {
        $carpoolads = [];

        $dataBaseService = new DataBaseService();
        $carpooladsDTO = $dataBaseService->getCarpoolAds();
        if (!empty($carpooladsDTO)) {
            foreach ($carpooladsDTO as $carpooladDTO) {
                $carpoolad = new CarpoolAd();
                $carpoolad->setId($carpooladDTO['id']);
                $carpoolad->setStartPlace($carpooladDTO['start_place']);
                $carpoolad->setDestination($carpooladDTO['destination']);
                $departuredate = new DateTime($carpooladDTO['departure_time']);
                if ($departuredate !== false) {
                    $carpoolad->setDepartureTime($departuredate);
                }
                $carpoolad->setPrice($carpooladDTO['price']);
                $carpoolads[] = $carpoolad;
            }
        }

        return $carpoolads;
    }

    /**
     * Delete a carpool ad.
     */
    public function deleteCarpoolAd(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteCarpoolAd($id);

        return $isOk;
    }
}
