<?php

class Ph_m extends MX_Model {

    public function get_all($start, $stop, $order, $search){

        $sql = "SELECT * FROM tb_ph order by ph_id DESC";
       
        $data =  $this->get_all_query($sql);

        

        return $data;
    }

  

   
    public function get_by_id($id){
        return $this->get_first('tb_ph', array('ph_id' => $id));
    }

    public function max_row(){
        return $this->get_count('tb_ph');
    }

    public function insert($data){
        return $this->add('tb_ph', $data);
    }

   
   

}