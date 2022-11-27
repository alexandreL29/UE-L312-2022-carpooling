<?php

use App\Controllers\CarpoolAdController;
use App\Services\CarsService;
use App\Services\BookingsService;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarpoolAdController();
echo $controller->createCarpoolAd();

$carsService = new CarsService();
$cars = $carsService->getCars();

$bookingsService = new BookingsService();
$bookings = $bookingsService->getBookings();
?>

<p>Création d'une annonce</p>
<form method="post" action="carpool_ad_create.php" name ="carpoolAdCreateForm">
    <label for="start_place">Lieux de départ :</label>
    <input type="text" name="start_place">
    <br />
    <label for="destination">Lieux d'arrivée :</label>
    <input type="text" name="destination">
    <br />
    <label for="departure_time">Horaire de départ au format dd-MM-yyyy hh:mm :</label>
    <input type="text" name="departure_time">
    <br />
    <label for="price">Prix :</label>
    <input type="text" name="price">
    <br />
    <label for="cars">Voiture(s) :</label>
    <?php foreach ($cars as $car): ?>
        <?php $carProperties = $car->getLicensePlate() . ' ' . $car->getColor() . ' ' . $car->getCost() . ' ' . $car->getNbSeat(); ?>
        <input type="checkbox" name="cars[]" value="<?php echo $car->getId(); ?>"><?php echo $carProperties; ?>
        <br />
    <?php endforeach; ?>
    <br />
    <label for="bookings">Réservation(s) :</label>
    <?php foreach ($bookings as $booking): ?>
        <?php $bookingName = $booking->getDay() . ' ' . $car->getHorary() . ' ' . $car->getNumber(); ?>
        <input type="checkbox" name="bookings[]" value="<?php echo $booking->getId(); ?>"><?php echo $bookingName; ?>
        <br />
    <?php endforeach; ?>
    <input type="submit" value="Créer une annonce">
</form>