<?php

use App\Controllers\BookingsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new BookingsController();
echo $controller->updateBookings();
?>

<p>Mise à jour d'une réservation</p>
<form method="post" action="booking_update.php" name ="bookingUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="day">Jour :</label>
    <input type="text" name="day">
    <br />
    <label for="horary">Horaire :</label>
    <input type="text" name="horary">
    <br />
    <label for="number">Nombre de personne(s) :</label>
    <input type="text" name="number">
    <br />
    <input type="submit" value="Modifier la réservation">
</form>