<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->updateCar();
?>

<p>Mise à jour d'une voiture</p>
<form method="post" action="cars_update.php" name ="carUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="license_plate">Plaque d'immatriculation :</label>
    <input type="text" name="license_plate">
    <br />
    <label for="color">Couleur :</label>
    <input type="text" name="color">
    <br />
    <label for="cost">Coût du voyage :</label>
    <input type="text" name="cost">
    <br />
    <label for="nb_seat">Nombre de place(s) disponible(s) :</label>
    <input type="text" name="nb_seat">
    <br />
    <input type="submit" value="Modifier la voiture">
</form>