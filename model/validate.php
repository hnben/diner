<?php

/**
 *328/path to stuff
 * Valid data for the diner app
 */

//Return true if food is entered

function isFood($food) : bool {
    if (trim($food) == ""){
        return false;
    }
    else if (!ctype_alpha($food)) {
        return false;
    }
    return true;
}

function validMeal($meal) : bool
{
    return (in_array($meal, getMeals()));
}
