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
require_once ('model/data-layer.php');
require_once ('model/validate.php');

//Test my Order class
//$order = new Order("pizza", "breakfast", "mayo");
//var_dump($order);


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

        //Initialize variables
        $food = "";
        $meal = "";

        //Validate the data
        if (isFood($_POST['food'])){
            $food = $_POST['food'];
        }
        else{
            $f3->set('errors["food"]' , "Invalid food");
        }

        if (isset($_POST['meal']) AND validMeal($_POST['meal'])){
            $meal = $_POST['meal'];
        }
        else{
            $f3->set('errors["meal"]', "Invalid meal choice");
        }

        //if there are no errors then reroute
        if (empty($f3->get('errors')) ){

            // Instantiate an Order object
            $order = new Order($food, $meal);


            // add order object into setter
            $f3->set('SESSION.order', $order);
            // Put the data in the session array
            //$f3->set('SESSION.food', $food);
            //$f3->set('SESSION.meal', $meal);

            //Redirect to order2 only if there are no errors
            $f3->reroute('summary');
        }
    }

    //Add data to the F3 "hive"
    $f3->set('meals', getMeals());

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





