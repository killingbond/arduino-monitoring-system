<?php

class Pengguna_m extends MX_Model {

    public function get_all($start, $stop, $order, $search){

        $sql = "SELECT * FROM user ";
        $order_by = 'ORDER BY ';
        switch($order[1]){
            case 1 : $order_by .= 'user_id';break;
            case 2 : $order_by .= 'name';break;
        }

        $search_by = " WHERE name LIKE '%$search%' ";
        $order_by .= ' '.($order[0] == 'A' ? 'ASC' : 'DESC');

        $sql .= " $search_by $order_by LIMIT $start, $stop";
        return $this->get_all_query($sql);
    }

    public function get_by_id($id){
        return $this->get_first('user', array('user_id' => $id));
    }

    public function max_row(){
        return $this->get_count('user');
    }

    public function insert($data){
        return $this->add('user', $data);
    }

    public function change($id, $data){
        return $this->update('user', 'user_id', $id, $data);
    }

    public function del($id){
        return $this->drop('user', 'user_id', $id);
    }

}