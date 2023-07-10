<?php

require_once('Manager\DefaultCarView.php');
require_once('customs\clientb\modules\CarViewB.php');

use Manager\DefaultCarView;
use Customs\ClientB\Modules\CarViewB;

$defaultCarView = new DefaultCarView('clientb');

$carView = new CarViewB($defaultCarView);

$garages = $carView->getGaragesList();
?>

<div class="d-flex flex-row">
    <div class="p-1">
        <div class="d-flex flex-column flex-shrink-0 p-3 m-1" style="width: 150px;">
            <div class="">
                <span class="fs-4">Modules</span>
            </div>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto" id="moduleChoice">
                <li>
                    <a href="#" class="nav-link moduleBtn" data-module="cars">
                        Voitures
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link active moduleBtn" data-module="garages">
                        Garages
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="p-1">
        <h1>[Client B] Liste des garages</h1>

        <?php foreach ($garages as $garage) {
            echo '<ul>';
            echo '<li>'.$garage['id'].'</li>';
            echo '<li>'.$garage['title'].'</li>';
            echo '<li><a href="#" class="editBtn" data-id="'.$garage['id'].'">edit</a></li>';
        } ?>
    </div>
</div>

