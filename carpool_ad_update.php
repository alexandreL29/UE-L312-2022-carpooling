<?php

use App\Controllers\CarpoolAdController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarpoolAdController();
echo $controller->updateCarpoolAd();
?>

<p>Mise à jour d'une annonce</p>
<form method="post" action="carpool_ad_update.php" name ="carpoolAdUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
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
    <input type="submit" value="Modifier l'annonce">
</form>