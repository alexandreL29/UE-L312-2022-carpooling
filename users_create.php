<?php

use App\Controllers\UsersController;
use App\Services\CarsService;
use App\Services\BookingsService;
use App\Services\CarpoolAdService;

require __DIR__ . '/vendor/autoload.php';

$controller = new UsersController();
echo $controller->createUser();

$carsService = new CarsService();
$cars = $carsService->getCars();

$bookingsService = new BookingsService();
$bookings = $bookingsService->getBookings();

$carpoolAdService = new CarpoolAdService();
$carpoolads = $carpoolAdService->getCarpoolAds();
?>

<p>Création d'un utilisateur</p>
<form method="post" action="users_create.php" name ="userCreateForm">
    <label for="firstname">Prénom :</label>
    <input type="text" name="firstname">
    <br />
    <label for="lastname">Nom :</label>
    <input type="text" name="lastname">
    <br />
    <label for="email">Email :</label>
    <input type="text" name="email">
    <br />
    <label for="birthday">Date d'anniversaire au format dd-mm-yyyy :</label>
    <input type="text" name="birthday">
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
    <br />
    <label for="carpoolads">Annonce(s) :</label>
    <?php foreach ($carpoolads as $carpoolad): ?>
        <?php $carpoolAdName = $carpoolad->getStartPlace() . ' ' . $carpoolad->getDestination() . ' ' . $carpoolad->getDepartureTime() . ' ' . $carpoolad->getPrice(); ?>
        <input type="checkbox" name="carpoolads[]" value="<?php echo $carpoolad->getId(); ?>"><?php echo $carpoolAdName; ?>
        <br />
    <?php endforeach; ?>
    <input type="submit" value="Créer un utilisateur">
</form>