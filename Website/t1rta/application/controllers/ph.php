<?php
class Ph extends MX_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('ph_m');
    }

    public function index()
	{
        $this->data['max'] = 10;
        $this->data['page'] = 1;
        $this->data['search'] = '';
        $this->data['order'] = 'A1';
        

        if($this->uri->segment(3) != ''){
            $this->data['page'] = $this->uri->segment(3);
        }

        if($this->uri->segment(4) != ''){
            $this->data['order'] = $this->uri->segment(4);
        }

        if($this->uri->segment(5) != ''){
            $this->data['max'] = $this->uri->segment(5);
        }

        if($this->uri->segment(6) != ''){
            $this->data['search'] = str_replace('%20', ' ', $this->uri->segment(6));
        }
        


        $this->data['start'] = (($this->data['page'] - 1) * $this->data['max']) + 1;
        $this->data['stop'] = ($this->data['page'] * $this->data['max']);

        $this->data['data_table'] = $this->ph_m->get_all($this->data['start']-1, $this->data['stop'], $this->data['order'], $this->data['search']);
        $this->data['max_row'] = $this->ph_m->max_row();

        if($this->data['max_row'] == 0){
            $this->data['start'] = 0;
        }

        if($this->data['stop'] > $this->data['max_row']){
            $this->data['stop'] = $this->data['max_row'];
        }

        $this->data['max_page'] = ceil($this->data['max_row'] / $this->data['max']);


        $this->load->view('slices/head', $this->data);
        $this->load->view('slices/header', $this->data);
        $this->load->view('product/ph', $this->data);
        $this->load->view('slices/footer', $this->data);
	}

   
}
