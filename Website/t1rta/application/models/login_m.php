<?php
/**
 * Created by PhpStorm.
 * User: jokopurnomoa
 * Date: 9/9/15
 * Time: 7:28 AM
 */

class Login_m extends MX_Model {

    public function auth($username, $password){
        date_default_timezone_set("Asia/Bangkok");
        $now = new DateTime();
        $datenow = $now->format("Y-m-d H:i:s");

        $data_login = $this->get_first('user', array('username' => $username, 'password' => $password));
        if($data_login != ''){
            if($data_login->username == $username && $data_login->password == $password){
                $this->session->set_userdata('is_login', true);
                $this->session->set_userdata('user_id', $data_login->user_id);
                $this->session->set_userdata('username', $data_login->username);
                $this->session->set_userdata('name', $data_login->name);
                $this->session->set_userdata('level', $data_login->level);
                 $sql = "SELECT * FROM tb_debit_air order by id_debit_air DESC LIMIT 1";
                
                 $this->db->from('tb_debit_air');
                  $this->db->order_by("id_debit_air", "desc");
                  $this->db->limit(1, 0);
                  $query1  = $this->db->get();

                 foreach ($query1->result() as $row)
                {
                    $data1=$row->id_debit_air;
                }

                $this->db->from('tb_ph');
                  $this->db->order_by("ph_id", "desc");
                  $this->db->limit(1, 0);
                  $query2  = $this->db->get();

                       foreach ($query2->result() as $row)
                {
                    $data2=$row->ph_id;
                }
                $adit = $this->input->ip_address();
                $data = array(
                    'ip' => $adit ,
                     'user_id' => $data_login->user_id,
                     'id_debit_air' => $data1,
                     'ph_id'=> $data2,
                     'tanggal'=> $datenow
                    );

                $this->db->insert('statistic', $data); 

               

                return true;
            }
        }
        return false;
    }

    public function save_profile($user_id, $data){
        return $this->update('user', 'user_id', $user_id, $data);
    }

}