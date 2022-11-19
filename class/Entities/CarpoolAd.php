<?php

namespace App\Entities;

use DateTime;

class CarpoolAd
{
    private $id;
    private $start_place;
    private $destination;
    private $departure_time;
    private $price;
    

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getStartPlace(): string
    {
        return $this->start_place;
    }

    public function setStartPlace(string $start_place): void
    {
        $this->start_place = $start_place;
    }

    public function setDestination(): string
    {
        return $this->destination;
    }

    public function getDestination(string $destination): void
    {
        $this->idestination = $destination;
    }

    public function getDepartureTime(): DateTime
    {
        return $this->departure_time;
    }

    public function setDepartureTime(DateTime $departure_time): void
    {
        $this->departure_time = $departure_time;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }
}