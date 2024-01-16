<?php
/*
 * Huy Nguyen
 * January 2024
 * https://hnguyen.greenriverdev.com/328/diner/
 * This is my CONTROLLER for the Diner app (Airport security)
*/

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once ('vendor/autoload.php');

// Instantiate Fat-Free framework (F3)
$f3 = Base::instance(); //static method

// Define a default route
$f3->route('GET /', function () {
    //echo "<h1> Test Test</h1>";

    // Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});
//Run Fat-Free

$f3 -> run();





