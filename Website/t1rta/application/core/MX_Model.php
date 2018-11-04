<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MX_Model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    protected function get_all($table, $where = '', $order = '', $limit = ''){
        if($where != ''){
            if(count($where) > 0){
                foreach($where as $key => $val){
                    $this->db->where($key, $val);
                }
            }
        }

        if($order != ''){
            if(count($order) > 0){
                foreach($order as $key => $val){
                    $this->db->order_by($key, $val);
                }
            }
        }

        if($limit != ''){
            $this->db->limit($limit);
        }

        $q = $this->db->get($table);
        if($q->num_rows() > 0){
            return $q->result();
        }
        return null;
    }

    protected function get_all_query($sql){
        $q = $this->db->query($sql);
        if($q->num_rows() > 0){
            return $q->result();
        }
        return null;
    }

    protected function get_all_param($table, $start, $length, $order, $add_cmd){
        $start = (int)$start;
        $stop = (int)$start + (int)$length;

        $sql = "SELECT * FROM $table $add_cmd $order LIMIT $start,$stop";

        $q = $this->db->query($sql);
        if($q->num_rows() > 0){
            return $q->result();
        }
        return null;
    }

    protected function get_by_id($table, $field, $id){
        $this->db->where($field, $id);
        $q = $this->db->get($table);
        if($q->num_rows() > 0){
            $data = $q->result();
            return $data[0];
        }
    }

    protected function get_count($table, $where = ''){
        if($where != ''){
            if(count($where) > 0){
                foreach($where as $key => $val){
                    $this->db->where($key, $val);
                }
            }
        }

        $q = $this->db->get($table);
        return $q->num_rows();
    }

    protected function get_count_query($sql){
        $q = $this->db->query($sql);
        return $q->num_rows();
    }

    protected function get_first($table, $where = '', $order = ''){
        if($where != ''){
            if(count($where) > 0){
                foreach($where as $key => $val){
                    $this->db->where($key, $val);
                }
            }
        }

        if($order != ''){
            if(count($order) > 0){
                foreach($order as $key => $val){
                    $this->db->order_by($key, $val);
                }
            }
        }

        $q = $this->db->get($table);
        if($q->num_rows() > 0){
            $data = $q->result();
            return $data[0];
        }
        return null;
    }

    protected function get_first_query($sql){
        $q = $this->db->query($sql);
        if($q->num_rows() > 0){
            $data = $q->result();
            return $data[0];
        }
        return null;
    }

    protected function add($table, $data){
        $this->db->insert($table, $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    protected function update($table, $field, $id, $data){

        $valid = true;

        if($id == ''){
            $valid = false;
        }

        if($valid){
            $this->db->where($field, $id);
            $this->db->update($table, $data);
            return ($this->db->affected_rows() != 1) ? false : true;
        } else {
            return false;
        }

    }

    protected function update_status($table, $field, $id, $data){
        $valid = true;

        if($id == ''){
            $valid = false;
        }

        if($valid){
            $this->db->where($field, $id);
            $this->db->update($table, $data);
            return ($this->db->affected_rows() != 1) ? false : true;
        } else {
            return false;
        }
    }

    protected function update_query($sql){
        $this->db->query($sql);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    protected function drop($table, $field, $id){
        $valid = true;

        if($id == ''){
            $valid = false;
        }

        if($valid){
            $this->db->where($field, $id);
            $this->db->delete($table);
            return ($this->db->affected_rows() != 1) ? false : true;
        } else {
            return false;
        }
    }


}
?>