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
//require_once ('controllers/controller.php');
//modify composer to add into the class map then update composer

//Test my Order class
//$order = new Order("pizza", "breakfast", "mayo");
//var_dump($order);

// Instantiate Fat-Free framework (F3)
$f3 = Base::instance(); //static method
$controller = new Controller($f3);


// Define a default route
$f3->route('GET /', function ($f3) {
    //echo "<h1> Test Test</h1>";

    $GLOBALS['controller']->home();
});

// Define a breakfast route
$f3->route('GET /breakfast', function () {
    //echo "<h1> Test Test</h1>";

    $GLOBALS['controller']->breakfast();

});

// Define a lunch route
$f3->route('GET /lunch', function () {
    //echo "<h1> Test Test</h1>";

    // Display a view page
    $view = new Template();
    echo $view->render('views/lunch-menu.html');
});

// Define a order route
$f3->route('GET|POST /order', function ($f3) {
    $GLOBALS['controller']->order1($f3);

});

// Define a summary route
$f3->route('GET /summary', function () {
    //echo "<h1> Test Test</h1>";

    $GLOBALS['controller']->summary();
});

//Run Fat-Free

$f3 -> run();





