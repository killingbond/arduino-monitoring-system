<?php
class Logout extends MX_Controller {

	public function index()
	{
        $this->session->sess_destroy();
        header('location:'.base_url());
	}

}
