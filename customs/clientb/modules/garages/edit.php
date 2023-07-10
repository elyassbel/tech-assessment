<?php

require_once('Manager\DefaultCarView.php');

use Manager\DefaultCarView;

$carView = new DefaultCarView('clientb');

$garage = $carView->getGarageDetails($_POST['id']);
?>

<h1>[Client B > Garage] Details de : <?= $garage['title'];?></h1>

<?php
echo '<ul>';
echo '<li>Id : '. $garage['id'].'</li>';
echo '<li>Nom du garage : '. $garage['title'].'</li>';
echo '<li>Adresse : '. $garage['address'].'</li>';
echo '</ul>';
?>
<a href="#" class="backBtn">Back</a>
