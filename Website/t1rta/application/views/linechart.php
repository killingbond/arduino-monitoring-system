<!DOCTYPE HTML>

<html>

	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->session->userdata('name');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php base_url2()?>template/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php base_url2()?>template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php base_url2()?>template/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php base_url2()?>template/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php base_url2()?>template/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php base_url2()?>template/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php base_url2()?>template/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php base_url2()?>template/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php base_url2()?>template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- SUMMERNOTE -->
    <link rel="stylesheet" href="<?php echo base_url()?>template/summernote/dist/summernote.css">
    

    <!-- My Style -->
    <link rel="stylesheet" href="<?php base_url2()?>css/my_style.css">

		<!--1) include file jquery.min.js dan higchart.js-->
		<script type="text/javascript" src="<?php base_url2(); ?>assets/jquery.min.js"></script>
		<script src="<?php base_url2(); ?>assets/highcharts.js"></script>

	</head>
	<body>
    <div class="wrapper">

<header class="main-header">
<!-- Logo -->
<a href="<?php base_url2()?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>R</b>C</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Tirta Dahaga</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
</a>
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-user"></i><span class="hidden-xs"><?php echo $this->session->userdata('name');?></span>
    </a>
    <ul class="dropdown-menu">
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="<?php base_url2()?>home/profile" class="btn btn-default btn-flat">Profile</a>
            </div>

            <div class="pull-right">
                <a href="<?php base_url2()?>logout" class="btn btn-default btn-flat">Sign out</a>
            </div>
        </li>
    </ul>
</li>
</ul>
</div>
</nav>
</header>
<?php echo $sidebar; ?>
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
                <h3>Rp. <?php foreach($data_debit as $row) { 
                    $debit = $row->debit;
                    $debitPenjualan = $debit*5;
                    echo $debitPenjualan;

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
        <div class="chart tab-pane active" id="container" style="position: relative; height: 300px;"></div>
        <div class="chart tab-pane active" id="revenue-chart3" style="position: relative; height: 300px;"></div>
    </div>
</div><!-- /.nav-tabs-custom -->

</section><!-- /.Left col -->

</div><!-- /.row (main row) -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!--grafik akan ditampilkan disini -->
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
<div id=link>


</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Developed By Aditya Purnama . Powered By <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong>
</footer>

</div><!-- ./wrapper -->

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
                        $kakak[$i] = $row2['debit'];
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
                    text: 'Debit Air'
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
                name: 'Debit Air',  
                
                data: [<?php echo $kakak[0] ?>,<?php echo $kakak[1] ?>,<?php echo $kakak[2] ?>,<?php echo $kakak[3] ?>,<?php echo $kakak[4] ?>]
            }
            ]
        });
    });
    
});
        </script>

<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?php base_url2()?>template/bootstrap/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php base_url2()?>template/plugins/morris/morris.min.js"></script>
<script src="<?php base_url2()?>template/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php base_url2()?>template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php base_url2()?>template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php base_url2()?>template/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php base_url2()?>template/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php base_url2()?>template/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php base_url2()?>template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php base_url2()?>template/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php base_url2()?>template/plugins/fastclick/fastclick.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url()?>template/summernote/dist/summernote.js"></script>

<!-- AdminLTE App -->
<script src="<?php base_url2()?>template/dist/js/demo.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery.chained.min.js"></script>
  
                <script type="text/javascript">
                
                $("#select_sub_category").chained("#select_category");
                
   </script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

	</body>

        
</html>