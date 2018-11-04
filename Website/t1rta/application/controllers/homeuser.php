<?php
class Homeuser extends MX_Controller {

	public function index()
	{
        $this->load->model('statistic_m');

        if(($this->session->userdata('is_login') != '')&&($this->session->userdata('level')==2)) {
            $this->load->view('slices/head', $this->data);
            $this->load->view('slices/header', $this->data);
            $this->load->view('homeuser', $this->data);
            $this->load->view('slices/footer', $this->data);
        } else if(($this->session->userdata('is_login') != '')&&($this->session->userdata('level')==1)){
            header('location:'.base_url());
        }else{
            $this->load->view('login', $this->data);
        }
	}

    public function profile(){
        $this->load->view('slices/head', $this->data);
        $this->load->view('slices/header', $this->data);
        $this->load->view('profile', $this->data);
        $this->load->view('slices/footer', $this->data);
    }

    public function save_profile(){
        $this->load->model('login_m');

        $user_id = $this->session->userdata('user_id');

        $data = array(
            'name' => clean_str($this->input->post('name')),
            'username' => clean_str($this->input->post('username')),
        );

        if(clean_str($this->input->post('password')) != ''){
            $data['password'] = md5(clean_str($this->input->post('password')));
        }

        $res = $this->login_m->save_profile($user_id, $data);
        if($res){
            $this->session->set_userdata('name', $data['name']);
            $this->session->set_userdata('username', $data['username']);
        }

        header('location:'.base_url().'home/profile?'.($res ? 'su' : 'fu'));
    }

}
