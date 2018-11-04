<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MX_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        error_reporting(E_ALL);
        ini_set('display_errors', 'on');

        $this->lang->load('en', 'english');
       

        $this->data = null;

      

        $sidebar = $this->load->view('slices/sidebar', $this->data, true);
        $this->data['sidebar'] = $sidebar;

        if($this->session->userdata('is_login') == '') {
            if($this->uri->segment(1) != ''){
                header('location:'.base_url());
            }
        }

    }

}
?>