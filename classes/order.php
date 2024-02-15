<?php

/**
 *  This Order class represents a food order for the diner
 * @author Huy Nguyen
 * @copyright  2024
 *
 */
class Order
{
    private $_food;
    private $_meal;
    private $_condiments;

    /**
     * The default constructor to instantiate the Order object
     * new Order()
     * new Order ("tacos")
     * new Order ("tacos", "lunch")
     * new Order ("tacos", "lunch", "salsa, guacamole")
     * @param String $food
     * @param String $meal
     * @param String $condiments
     */
    public function __construct($food="", $meal="", $condiments="")
    {
        $this->_food = $food;
        $this->_meal = $meal;
        $this->_condiments = $condiments;
    }

    /**
     * Return food
     * @return String food
     */
    public function getFood()
    {
        return $this->_food;
    }

    /**
     * set the food
     * @param String $food
     */
    public function setFood($food): void
    {
        $this->_food = $food;
    }

    /**
     * get the meal
     * @return String meal
     */
    public function getMeal()
    {
        return $this->_meal;
    }

    /**
     * Set the meal
     * @param String $meal
     */
    public function setMeal($meal): void
    {
        $this->_meal = $meal;
    }

    /**
     * Get the condiments
     * @return String condiments
     */
    public function getCondiments()
    {
        return $this->_condiments;
    }

    /**
     * Set the condiments
     * @param String $condiments
     */
    public function setCondiments($condiments): void
    {
        $this->_condiments = $condiments;
    }

}