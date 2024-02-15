<?php
/**
 * this file represent the data layer of the diner app
 *
 *
 */

class DataLayer
{
    //static is classname::
    //instanced method is object->
    static function getMeals(){
        return array('breakfast','brunch' ,'lunch', 'dinner');
    }
}
