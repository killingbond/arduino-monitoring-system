<?php
/**
 * Created by JetBrains PhpStorm.
 * User: JOKO PURNOMO A
 * Date: 7/15/14
 * Time: 12:54 PM
 * To change this template use File | Settings | File Templates.
 */

function auto_id()
{
    return rand(0, 100000).floor(microtime(true)*100);
}

function timezone(){
    return time() + (60 * 60 * 11);
}