<?php

require_once('Manager\DefaultCarView.php');

use Manager\DefaultCarView;

$carView = new DefaultCarView('clientc');

$car = $carView->getCarDetails($_POST['id']);
?>

<h1>[Client C] Details de : <?= $car['modelName']; ?></h1>

<?php
echo '<ul>';
echo '<li>Id : ' . $car['id'] . '</li>';
echo '<li>Nom du modèle : ' . $car['modelName'] . '</li>';
echo '<li>Année : ' . $car['year'] . '</li>';
echo '<li>Marque : ' . $car['brand'] . '</li>';
echo '<li>Puissance : ' . $car['power'] . '</li>';
echo '<li>Client : ' . $car['customer'] . '</li>';
echo '<li>Garage : ' . $car['garageId'] . '</li>';
echo '<li><div class="p-1 text-white" style="background-color: ' . $car['colorHex'] . '">' . $car['colorHex'] . '</div>' . '</li>';
echo '</ul>';
?>
<a href="#" class="backBtn">Back</a>

