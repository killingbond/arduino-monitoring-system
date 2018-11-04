<?php
class Home extends MX_Controller {

	public function index()
	{
        $this->load->model('statistic_m');

        if(($this->session->userdata('is_login') != '')&&($this->session->userdata('level')==1)) {

            $this->data['data_ph'] = $this->statistic_m->get_last_ph();
            $this->data['data_debit'] = $this->statistic_m->total_debit();
            $this->load->view('slices/head', $this->data);
            $this->load->view('slices/header', $this->data);
            $this->load->view('home', $this->data);
            $this->load->view('slices/footer', $this->data);
           
        } else if(($this->session->userdata('is_login') != '')&&($this->session->userdata('level')==2)){
            header('location:'.base_url("homeuser"));
        }else{
            $this->load->view('login', $this->data);
        }
	}

   

}
