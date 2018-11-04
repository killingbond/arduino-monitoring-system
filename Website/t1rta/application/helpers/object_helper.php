<?php
/**
 * Created by JetBrains PhpStorm.
 * User: JOKO PURNOMO A
 * Date: 9/1/14
 * Time: 1:30 PM
 * To change this template use File | Settings | File Templates.
 */

function arrayToObject($array) {
    if (!is_array($array)) {
        return $array;
    }

    $object = new stdClass();
    if (is_array($array) && count($array) > 0) {
        foreach ($array as $name=>$value) {
            $name = strtolower(trim($name));
            if (!empty($name)) {
                $object->$name = arrayToObject($value);
            }
        }
        return $object;
    }
    else {
        return FALSE;
    }
}