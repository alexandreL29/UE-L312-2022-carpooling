<?php

use App\Controllers\CarpoolAdController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarpoolAdController();
echo $controller->deleteCarpoolAd();
?>

<p>Supression d'une annonce</p>
<form method="post" action="carpool_ad_delete.php" name ="carpoolAdDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer une annonce">
</form>