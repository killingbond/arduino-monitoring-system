<?php


class Debit_m extends MX_Model {

    public function get_all($start, $stop, $order, $search){

        $sql = "SELECT * FROM tb_debit_air order by id_debit_air DESC";
       
        $data =  $this->get_all_query($sql);

        

        return $data;
    }

  

   
    public function get_by_id($id){
        return $this->get_first('tb_debit_air', array('id_debit_air' => $id));
    }

    public function max_row(){
        return $this->get_count('tb_debit_air');
    }

   

   
   

}