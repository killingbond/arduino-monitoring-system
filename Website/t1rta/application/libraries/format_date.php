<?php
/**
 * Created by JetBrains PhpStorm.
 * User: JOKO
 * Date: 3/3/14
 * Time: 4:53 PM
 * To change this template use File | Settings | File Templates.
 */
class Format_date {
    var $arr_month = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    var $arr_month2 = array('', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

    function dmy_to_ymd($date, $separator){
        $day = substr($date, 0, 2);
        $month = substr($date, 3, 2);
        $year = substr($date, 6, 4);

        return $year.$separator.$month.$separator.$day;
    }

    function ymd_to_dmy($date, $separator){
        $year = substr($date, 0, 4);
        $month = substr($date, 5, 2);
        $day = substr($date, 8, 2);

        return $day.$separator.$month.$separator.$year;
    }

    function format_dmy($date){
        $year = substr($date, 0, 4);
        $month = substr($date, 5, 2);
        $day = substr($date, 8, 2);

        return $day.' '.$this->arr_month2[$month*1].' '.$year;
    }

    function format_dmy_his($date){
        $year = substr($date, 0, 4);
        $month = substr($date, 5, 2);
        $day = substr($date, 8, 2);

        $hour = substr($date, 11, 2);
        $minute = substr($date, 14, 2);
        $second = substr($date, 17, 2);

        if($date != '0000-00-00 00:00:00')
            return $day.' '.$this->arr_month2[$month*1].' '.$year.' - '.$hour.':'.$minute.':'.$second;
        else
            return '-';
    }

    function format_dmy_hi($date){
        $year = substr($date, 0, 4);
        $month = substr($date, 5, 2);
        $day = substr($date, 8, 2);

        $hour = substr($date, 11, 2);
        $minute = substr($date, 14, 2);

        if($date != '0000-00-00 00:00:00')
            return $day.' '.$this->arr_month2[$month*1].' '.$year.' - '.$hour.':'.$minute;
        else
            return '-';
    }

    function ymd_to_dmyhi($date, $separator){
        $year = substr($date, 0, 4);
        $month = substr($date, 5, 2);
        $day = substr($date, 8, 2);

        $hour = substr($date, 11, 2);
        $minute = substr($date, 14, 2);

        return $day.$separator.$month.$separator.$year.' '.$hour.':'.$minute;
    }

    function dmyhi_to_ymdhi($date){
        $day = substr($date, 0, 2);
        $month = substr($date, 3, 2);
        $year = substr($date, 6, 4);

        $hour = substr($date, 11, 2);
        $minute = substr($date, 14, 2);

        return $year.'-'.$month.'-'.$day.' '.$hour.':'.$minute;
    }

    function day($date){
        return substr($date, 8, 2);
    }

    function month_name($date){
        $month = substr($date, 5, 2);

        return $this->arr_month2[$month*1];
    }
}