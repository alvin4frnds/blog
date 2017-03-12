<?php
/**
 * Created by PhpStorm.
 * User: praveen
 * Date: 3/12/17
 * Time: 11:00 AM
 */

namespace app\Resolvers;


class ModelResolver
{
    
    public static function generateName($title)
    {
        return str_replace(" ", "-", $title);
    }
}