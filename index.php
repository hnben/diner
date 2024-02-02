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

// Define a breakfast route
$f3->route('GET /breakfast', function () {
    //echo "<h1> Test Test</h1>";

    // Display a view page
    $view = new Template();
    echo $view->render('views/breakfast-menu.html');
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
    //echo "<h1> Test Test</h1>";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Validate the data
        $food = $_POST['food'];
        $meal = $_POST['meal'];
        // Put the data in the session array
        $f3->set('SESSION.food', $food);
        $f3->set('SESSION.meal', $meal);

        //Redirect to order2
        $f3->reroute('summary');
    }

    // Display a view page
    $view = new Template();
    echo $view->render('views/order1.html');
});

// Define a summary route
$f3->route('GET /summary', function () {
    //echo "<h1> Test Test</h1>";

    // Display a view page
    $view = new Template();
    echo $view->render('views/order-summary.html');
});

//Run Fat-Free

$f3 -> run();





