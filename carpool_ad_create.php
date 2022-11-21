<?php

use App\Controllers\CarpoolAdController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarpoolAdController();
echo $controller->createCarpoolAd();
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
    
    <input type="submit" value="Créer une annonce">
</form>