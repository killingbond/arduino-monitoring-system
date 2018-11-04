<?php

class Statistic_m extends MX_Model {

    public function get_today_viewer(){
        return $this->get_count('statistic', array('date' => date('Y-m-d')));
    }

    function get_last_ph(){

        $sql ="select * from tb_ph order by ph_id DESC limit 1";
        return $this->get_all_query($sql);

    }

      function total_debit(){

        $sql ="select * from tb_debit_air order by id_debit_air DESC limit 1";
        return $this->get_all_query($sql);

    }

    public function get_total_viewer(){
        return $this->get_count('statistic');
    }

    public function get_total_product(){
        return $this->get_count('product');
    }

    public function get_chart_delivered(){
        $date = date('Y');
        $sql = "SELECT MONTH(order_date) AS month1, count(order_id) AS total FROM orderlist WHERE YEAR(order_date) = '$date' AND status = 'DELIVERED' GROUP BY MONTH(order_date) ";
        return $this->get_all_query($sql);
    }

    public function get_chart_canceled(){
        $date = date('Y');
        $sql = "SELECT MONTH(order_date) AS month1, count(order_id) AS total FROM orderlist WHERE YEAR(order_date) = '$date' AND status = 'CANCELED' GROUP BY MONTH(order_date)";
        return $this->get_all_query($sql);
    }

}