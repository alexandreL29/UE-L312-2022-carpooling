<?php

namespace App\Entities;

class Car
{
    private $id;
    private $license_plate;
    private $color;
    private $cost;
    private $nb_seat;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getLicensePlate(): string
    {
        return $this->license_plate;
    }

    public function setLicensePlate(string $license_plate): void
    {
        $this->id = $license_plate;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->id = $color;
    }

    public function getCost(): string
    {
        return $this->cost;
    }

    public function setCost(float $cost): void
    {
        $this->id = $cost;
    }

    public function getNbSeat(): string
    {
        return $this->nb_seat;
    }

    public function setNbSeat(int $nb_seat): void
    {
        $this->id = $nb_seat;
    }
}
