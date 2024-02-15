<?php

/**
 *328/path to stuff
 * Valid data for the diner app
 */

//Return true if food is entered

class Validate {
    static function isFood($food) : bool {
        if (trim($food) == ""){
            return false;
        }
        else if (!ctype_alpha($food)) {
            return false;
        }
        return true;
    }

    static function validMeal($meal) : bool
    {
        return (in_array($meal, DataLayer::getMeals()));
    }
}
