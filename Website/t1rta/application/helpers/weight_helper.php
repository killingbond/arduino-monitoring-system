<?php
/**
 * Created by JetBrains PhpStorm.
 * User: JOKO PURNOMO A
 * Date: 9/1/14
 * Time: 1:24 PM
 * To change this template use File | Settings | File Templates.
 */

function round_weight($weight){
    $CI =& get_instance();
    $setting_basic = $CI->asset_m->get_web_basic();
    $weight_tolerance = $setting_basic->weight_tolerance;
    if($weight < 1){
        $result = 1;
    } else {
        $r_weight = floor($weight);
        $dec_weight = $weight - $r_weight;
        if($dec_weight <= $weight_tolerance){
            $result = floor($weight);
        } else {
            $result = ceil($weight);
        }
    }
    return $result;
}