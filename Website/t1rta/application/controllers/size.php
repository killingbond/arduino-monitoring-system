<?php
class Size extends MX_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('size_m');
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

        $this->data['data_table'] = $this->size_m->get_all($this->data['start']-1, $this->data['stop'], $this->data['order'], $this->data['search']);
        $this->data['max_row'] = $this->size_m->max_row();

        if($this->data['max_row'] == 0){
            $this->data['start'] = 0;
        }

        if($this->data['stop'] > $this->data['max_row']){
            $this->data['stop'] = $this->data['max_row'];
        }

        $this->data['max_page'] = ceil($this->data['max_row'] / $this->data['max']);


        $this->load->view('slices/head', $this->data);
        $this->load->view('slices/header', $this->data);
        $this->load->view('user/size', $this->data);
        $this->load->view('slices/footer2', $this->data);
	}

    public function add(){
        $this->load->view('slices/head', $this->data);
        $this->load->view('slices/header', $this->data);
        $this->load->view('user/add_size', $this->data);
        $this->load->view('slices/footer2', $this->data);
    }

    public function update(){
        $this->data['data_update'] = $this->size_m->get_by_id($this->uri->segment(3));

        $this->load->view('slices/head', $this->data);
        $this->load->view('slices/header', $this->data);
        $this->load->view('user/edit_size', $this->data);
        $this->load->view('slices/footer2', $this->data);
    }

    public function add_size(){
        $data = array(
            'size' => clean_str($this->input->post('user'))
        );

        $res = $this->size_m->insert($data);
        header('location:'.base_url().'size?'.($res ? 'sa' : 'fa'));
    }

    public function save_change(){
        $data = array(
            'size' => clean_str($this->input->post('size'))
        );

        $id = clean_str($this->input->post('size_id'));
        $res = $this->size_m->change($id, $data);
        header('location:'.base_url().'size?'.($res ? 'su' : 'fu'));
    }

    public function drop(){
        $data_delete = $this->input->post('data_delete');

        $data_delete = explode(',', $data_delete);
        $res = true;
        foreach($data_delete as $id){
            if(!$this->size_m->del($id)){
                $res = false;
            }
        }
        header('location:'.base_url().'size?'.($res ? 'sd' : 'fd'));
    }

}
