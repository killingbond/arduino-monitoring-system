<?php
/**
 * Created by JetBrains PhpStorm.
 * User: JOKO PURNOMO A
 * Date: 8/13/14
 * Time: 4:54 PM
 * To change this template use File | Settings | File Templates.
 */

function base_url2(){
    echo base_url();
}

function gen_link($title){
    $title = str_replace('-', '_', $title);
    $title = str_replace(' ', '-', $title);
    $title = str_replace('/', '--', $title);
    $title = str_replace('\'', '%20', $title);
    $title = str_replace(',', '__', $title);
    return strtolower($title);
}

function dir_up($dir, $up){
    $dir = str_replace('\\', '/', $dir);
    $adir = explode('/', $dir);
    $rdir = '';
    for($i = 0; $i < count($adir) - $up; $i++){
        $rdir .= $adir[$i].'/';
    }
    return $rdir;
}