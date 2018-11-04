<?php
/**
 * Created by JetBrains PhpStorm.
 * User: JOKO PURNOMO A
 * Date: 8/3/14
 * Time: 10:22 PM
 * To change this template use File | Settings | File Templates.
 */

class PHPMailerLoader {

    function __construct(){
        require_once APPPATH."/third_party/PHPmailer/class.phpmailer.php";
    }
}