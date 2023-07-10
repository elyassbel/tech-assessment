<?php

require_once('Manager\DefaultCarView.php');
require_once('customs\clienta\modules\CarViewA.php');

use Manager\DefaultCarView;
use Customs\ClientA\Modules\CarViewA;

$defaultCarView = new DefaultCarView('clienta');

$carView = new CarViewA($defaultCarView);

$cars = $carView->getCarsList();
?>

<h1>[Client A] Liste des véhicules</h1>

<?php
foreach ($cars as $car) {
    $age = date('Y') - (int) $car['year'];
    $badge = '';
    if ($age > 10) {
        $badge = ' <span class="badge bg-danger">Old</span>';
    } elseif ($age < 2) {
        $badge = ' <span class="badge bg-success">New</span>';
    }
    echo '<ul>';
    echo '<li>Nom de la voiture : ' . $car['modelName'] . $badge.'</li>';
    echo '<li>Marque : ' . $car['brand'] . '</li>';
    echo '<li>Année : ' . $car['year'] . '</li>';
    echo '<li>Puissance : ' . $car['power'] . '</li>';
    echo '<li><a href="#" class="editBtn" data-id="' . $car['id'] . '">edit</a></li>';
    echo '</ul>';
}
?>
