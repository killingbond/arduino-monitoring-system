<?php
class Login extends MX_Controller {

	public function index()
	{

	}

    public function auth(){
        $this->load->model('login_m');

        $username = clean_str($this->input->post('username'));
        $password = md5(clean_str($this->input->post('password')));

        if(($this->login_m->auth($username, $password))&&($this->session->userdata('level')==1)){
            header('location:'.base_url());
        }else if(($this->login_m->auth($username, $password))&&($this->session->userdata('level')==2)){
            header('location:'.base_url("homeuser"));
        }else{
            header('location:'.base_url().'?f');
        }
    }

    public function lupapass()
    {
          $this->load->view('lupa', $this->data);
    }


}
