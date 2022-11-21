<?php

use App\Controllers\BookingsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new BookingsController();
echo $controller->deleteBookings();
?>

<p>Supression d'une réservation</p>
<form method="post" action="booking_delete.php" name ="bookingDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer une réservation">
</form>