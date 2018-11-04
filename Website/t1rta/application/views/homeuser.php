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
        <div class="chart tab-pane active" id="revenue-chart2" style="position: relative; height: 300px;"></div>
        <div class="chart tab-pane active" id="revenue-chart3" style="position: relative; height: 300px;"></div>
    </div>
</div><!-- /.nav-tabs-custom -->

</section><!-- /.Left col -->

</div><!-- /.row (main row) -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
    $(document).ready(function(){
        /* Morris.js Charts */
        // Sales chart
        var area = new Morris.Area({
            element: 'revenue-chart2',
            resize: true,
            data: [
                <?php
                if($chart_delivered != ''){
                    foreach($chart_delivered as $row){
                        echo '{y: "'.date('Y').'-'.$row->month1.'", item1: '.$row->total.'},';
                    }
                }
                ?>
            ],
            xkey: 'y',
            ykeys: ['item1'],
            labels: ['Order'],
            lineColors: ['#00A65A'],
            hideHover: 'auto'
        });

        var area2 = new Morris.Area({
            element: 'revenue-chart3',
            resize: true,
            data: [
                <?php
                if($chart_canceled != ''){
                    foreach($chart_canceled as $row){
                        echo '{y: "'.date('Y').'-'.$row->month1.'", item1: '.$row->total.'},';
                    }
                }
                ?>
            ],
            xkey: 'y',
            ykeys: ['item1'],
            labels: ['Order'],
            lineColors: ['#DD4B39'],
            hideHover: 'auto'
        });

        $('#revenue-chart3').attr('class', 'chart tab-pane');
    });
</script>