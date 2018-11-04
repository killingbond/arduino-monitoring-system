<?php
echo $sidebar;

error_reporting(0);

?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php foreach($data_debit as $row) { 
                    $tangki = $row->debit;
                    $debitTangki = $tangki/5000;
                    echo $debitTangki;

                 } ?> </h3>
                <p>Transaksi</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer"></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>Rp <?php foreach($data_debit as $row) { 
                    $debit = $row->debit;
                    $debitPenjualan = $debit*5;
                    echo number_format($debitPenjualan,0, ".",".");

                 } ?></h3>
                <p>Pendapatan</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer"></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php foreach($data_debit as $row) { echo $row->debit; } ?> mL</h3>
                <p>Total Debit</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>i
            </div>
            <a href="#" class="small-box-footer"></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?php foreach($data_ph as $row) { echo $row->ph; } ?></h3>
                <p>PH Sekarang</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer"></a>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->
<!-- Main row -->
<div class="row">
<!-- Left col -->
<section class="col-lg-12 connectedSortable">

<!-- Custom tabs (Charts with tabs)-->
<div class="nav-tabs-custom">
    <!-- Tabs within a box -->
   
    <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
        <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
<div id=link>


</div>
    </div>
</div><!-- /.nav-tabs-custom -->

</section><!-- /.Left col -->

</div><!-- /.row (main row) -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript">
        //2)script untuk membuat grafik, perhatikan setiap komentar agar paham
        <?php 
                
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "db_tirta_dahaga";
                date_default_timezone_set("Asia/Bangkok");
               $conn = new mysqli($servername, $username, $password, $dbname);
            
                $sql = "SELECT DISTINCT DATE_FORMAT(tanggal, '%M') AS tanggal FROM tb_debit_air WHERE (DATE(tanggal) BETWEEN DATE(NOW() - INTERVAL 5  MONTH) AND  DATE(NOW()) )";
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 

                   
                    $result = $conn->query($sql);
                    $i=0;
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    $dede[$i] = $row['tanggal'];
                    $bulan = $row['tanggal'];
                    $sql2 = "SELECT debit FROM tb_debit_air WHERE DATE_FORMAT(tanggal, '%M') = '$bulan'
 ORDER BY debit DESC LIMIT 1";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                        while($row2 = $result2->fetch_assoc()) {

                        $totalair[$i] = $row2['debit']*5;
                        }
                    }
                    $i=$i+1;

                 
                    }
                }
                
?>


       
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container', //letakan grafik di div id container
                //Type grafik, anda bisa ganti menjadi area,bar,column dan bar
                type: 'line',  
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Grafik Penjualan Air',
                x: -20 //center
            },
            subtitle: {
                text: 'Tirtadahaga.com',
                x: -20
            },
            xAxis: { //X axis menampilkan data bulan 
                categories: [ '<?php echo $dede[0]; ?>', '<?php echo $dede[1]; ?>', '<?php echo $dede[2]; ?>','<?php echo $dede[3]; ?>','<?php echo $dede[4]; ?>']
            },
            yAxis: {
                title: {  //label yAxis
                    text: 'Pendapatan (Rp)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080' //warna dari grafik line
                }]
            },
            tooltip: { 
            //fungsi tooltip, ini opsional, kegunaan dari fungsi ini 
            //akan menampikan data di titik tertentu di grafik saat mouseover
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y ;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            //series adalah data yang akan dibuatkan grafiknya,
        
            series: [{  
                name: 'Pendapatan (Rp)',  
                
                data: [<?php echo $totalair[0] ?>,<?php echo $totalair[1] ?>,<?php echo $totalair[2] ?>,<?php echo $totalair[3] ?>,<?php echo $totalair[4] ?>]
            }
            ]
        });
    });
    
});
        </script>