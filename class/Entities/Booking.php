<?php

namespace App\Entities;

use DateTime;

class Booking
{
    private $id;
    private $day;
    private $horary;
    private $number;
    

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getDay(): string
    {
        return $this->day;
    }

    public function setDay(string $day): void
    {
        $this->day = $day;
    }

    public function getHorary(): DateTime
    {
        return $this->horary;
    }

    public function setHorary(DateTime $horary): void
    {
        $this->horary = $horary;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): void
    {
        $this->number = $number;
    }
}