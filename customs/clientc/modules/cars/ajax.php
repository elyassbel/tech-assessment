<?php

require_once('Manager\DefaultCarView.php');

use Manager\DefaultCarView;

$defaultCarView = new DefaultCarView('clientc');

$cars = $defaultCarView->getCarsList();
?>

<h1>[Client C] Liste des véhicules</h1>

<?php foreach ($cars as $car) {
    echo '<ul>';
    echo '<li><div class="p-1 text-white" style="background-color: '.$car['colorHex'].'">'.$car['modelName'].'</div></li>';
    echo '<li><a href="#" class="editBtn" data-id="'.$car['id'].'">edit</a></li>';
    echo '</ul>';
} ?>
