<?php
/**
 * Created by JetBrains PhpStorm.
 * User: JOKO PURNOMO A
 * Date: 9/1/14
 * Time: 1:24 PM
 * To change this template use File | Settings | File Templates.
 */

function clean_str($str){
    return trim(addslashes(htmlspecialchars_decode($str)));
}


function similarity($string1, $string2){
    similar_text(strtoupper($string1), strtoupper($string2), $percent);
    return $percent;
}