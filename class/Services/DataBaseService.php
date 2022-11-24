<?php

namespace App\Services;

use DateTime;
use Exception;
use PDO;

class DataBaseService
{
    const HOST = '127.0.0.1';
    const PORT = '3306';
    const DATABASE_NAME = 'carpooling';
    const MYSQL_USER = 'root';
    const MYSQL_PASSWORD = 'password';

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::DATABASE_NAME,
                self::MYSQL_USER,
                self::MYSQL_PASSWORD
            );
            $this->connection->exec("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /**
     * Create an user.
     */
    public function createUser(string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'INSERT INTO users (firstname, lastname, email, birthday) VALUES (:firstname, :lastname, :email, :birthday)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $sql = 'SELECT * FROM users';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $users = $results;
        }

        return $users;
    }

    /**
     * Update an user.
     */
    public function updateUser(string $id, string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, birthday = :birthday WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM users WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }


    /*************************** Car functions *******************************************/


    /**
     * Create a car.
     */
    public function createCar(string $license_plate, string $color, string $cost, string $nb_seat): bool
    {
        $isOk = false;

        $data = [
            'license_plate' => $license_plate,
            'color' => $color,
            'cost' => $cost,
            'nb_seat' => $nb_seat,
        ];
        $sql = 'INSERT INTO cars (license_plate, color, cost, nb_seat) VALUES (:license_plate, :color, :cost, :nb_seat)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $sql = 'SELECT * FROM cars';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $cars = $results;
        }

        return $cars;
    }

    /**
     * Update a car.
     */
    public function updateCar(string $id, string $license_plate, string $color, string $cost, string $nb_seat): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'license_plate' => $license_plate,
            'color' => $color,
            'cost' => $cost,
            'nb_seat' => $nb_seat,
        ];
        $sql = 'UPDATE cars SET license_plate = :license_plate, color = :color, cost = :cost, nb_seat = :nb_seat WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an user.
     */
    public function deleteCar(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM cars WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }


    /*************************** Booking functions *******************************************/


    /**
     * Create a car.
     */
    public function createBooking(string $day, string $horary, int $number): bool
    {
        $isOk = false;

        $data = [
            'day' => $day,
            'horary' => $horary,
            'numb' => $number,
        ];
        $sql = 'INSERT INTO bookings (day, horary, numb) VALUES (:day, :horary, :numb)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all bookings.
     */
    public function getBookings(): array
    {
        $cars = [];

        $sql = 'SELECT * FROM bookings';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $bookings = $results;
        }

        return $bookings;
    }

    /**
     * Update a booking.
     */
    public function updateBooking(string $id, string $day, string $horary, string $number): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'day' => $day,
            'horary' => $horary,
            'numb' => $number,
        ];
        $sql = 'UPDATE bookings SET day = :day, horary = :horary, numb = :numb WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an user.
     */
    public function deleteBooking(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM bookings WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /*************************** CarpooAd functions *******************************************/


    /**
     * Create a carpool ad.
     */
    public function createCarpoolAd(string $start_place, string $destination, string $departure_time, string $price): bool
    {
        $isOk = false;

        $data = [
            'start_place' => $start_place,
            'destination' => $destination,
            'departure_time' => $departure_time,
            'price' => $price,
        ];
        $sql = 'INSERT INTO carpoolads (start_place, destination, departure_time, price) VALUES (:start_place, :destination, :departure_time, :price)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all carpool ads.
     */
    public function getCarpoolAds(): array
    {
        $carpoolads = [];

        $sql = 'SELECT * FROM carpoolads';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $carpoolads = $results;
        }

        return $carpoolads;
    }

    /**
     * Update a carpool ad.
     */
    public function updateCarpoolAd(string $id, string $start_place, string $destination, string $departure_time, string $price): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'start_place' => $start_place,
            'destination' => $destination,
            'departure_time' => $departure_time,
            'price' => $price,
        ];
        $sql = 'UPDATE carpoolads SET start_place = :start_place, destination = :destination, departure_time = :departure_time, price = :price WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete a carpool ad.
     */
    public function deleteCarpoolAd(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM carpoolads WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
}
