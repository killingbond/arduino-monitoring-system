<?php
/**
 * Created by JetBrains PhpStorm.
 * User: JOKO PURNOMO A
 * Date: 8/3/14
 * Time: 10:22 PM
 * To change this template use File | Settings | File Templates.
 */

class Checker {

    var $coming_soon_active = false;

    function __construct(){
        $CI =& get_instance();
        if($CI->session->userdata('coming_soon_page') != ''){
            if($CI->session->userdata('coming_soon_page') == 'true'){
                $this->coming_soon_active = true;
            }
        }
    }

    function check(){
        $CI =& get_instance();

        /* Make CI cache not active */
        $CI->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $CI->output->set_header("Pragma: no-cache");

        $data = $CI->coming_soon_m->get_last();

        if($data->activated && !$this->coming_soon_active){
            header('location:'.base_url().'hold');
            exit();
        }
    }

    function is_activated(){
        $CI =& get_instance();

        $data = $CI->coming_soon_m->get_last();

        if($data->activated && !$this->coming_soon_active){
            return true;
        } else {
            return false;
        }
    }

}