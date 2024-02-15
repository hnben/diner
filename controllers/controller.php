<?php
/**
 * 328/diner/controllers/controller.php
 *
 * The controller app for my diner app
 */

class Controller
{
    private $_f3; //Fat-free router
    public function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        // Display a view page
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function order1()
    {
        //echo "<h1> Test Test</h1>";

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Initialize variables
            $food = "";
            $meal = "";

            //Validate the data
            if (Validate::isFood($_POST['food'])){
                $food = $_POST['food'];
            }
            else{
                $this->_f3->set('errors["food"]' , "Invalid food");
            }

            if (isset($_POST['meal']) AND Validate::validMeal($_POST['meal'])){
                $meal = $_POST['meal'];
            }
            else{
                $this->_f3->set('errors["meal"]', "Invalid meal choice");
            }

            //if there are no errors then reroute
            if (empty($this->_f3->get('errors')) ){

                // Instantiate an Order object
                $order = new Order($food, $meal);


                // add order object into setter
                $this->_f3->set('SESSION.order', $order);
                // Put the data in the session array
                //$f3->set('SESSION.food', $food);
                //$f3->set('SESSION.meal', $meal);

                //Redirect to order2 only if there are no errors
                $this->_f3->reroute('summary');
            }
        }

        //Add data to the F3 "hive"
        $this->_f3->set('meals', DataLayer::getMeals());

        // Display a view page
        $view = new Template();
        echo $view->render('views/order1.html');
    }

    function summary()
    {
        // Display a view page
        $view = new Template();
        echo $view->render('views/order-summary.html');
    }

    function breakfast()
    {
        // Display a view page
        $view = new Template();
        echo $view->render('views/breakfast-menu.html');
    }
}