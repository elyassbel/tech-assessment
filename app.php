<?php

/**
 * MAIN FILE
 * call the correct script file and render the content
 */

require 'Manager/AppManager.php';

use Manager\AppManager;

if (isset($_POST['cookieValue'])) {
    // setting values
    $cookieValue = $_POST['cookieValue']; // = client id
    $module = $_POST['module'];
    $script = $_POST['script'];
    $carId  = isset($_POST['carId']) ?: '';

    // calling the helper, AppManager
    $manager = new AppManager($cookieValue);

    // Set cookie
    $manager->updateCookie();

    // Getting the correct file
    $file = $manager->getAjaxFile($module, $script);
    if ($file) {
        require_once $file;

        return;
    }

    // Default
    echo 'Please select a client';
}
