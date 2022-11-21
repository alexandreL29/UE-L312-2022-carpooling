<?php

use App\Controllers\BookingsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new BookingsController();
echo $controller->createBooking();
?>

<p>Création d'une réservation</p>
<form method="post" action="booking_create.php" name ="bookingCreateForm">
    <label for="day">Jour :</label>
    <input type="text" name="day">
    <br />
    <label for="horary">Horaire :</label>
    <input type="text" name="horary">
    <br />
    <label for="number">Nombre de personnes(s) :</label>
    <input type="text" name="number">
    <br />
    <input type="submit" value="Créer une réservation">
</form>