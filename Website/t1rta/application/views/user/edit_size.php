<?php
echo $sidebar;



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Size
            <small>Edit Size</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Home</a></li>
            <li class="active">Add Size</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Size</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form role="form" action="<?php base_url2()?>size/save_change" method="post">

                    <input type="hidden" name="size_id" value="<?php echo $data_update->size_id?>">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="pull-left m-label col-sm-1">Size</label>
                            <div class="col-sm-3">
                                <input type="text" name="size" class="form-control" id="exampleInputEmail1" placeholder="Size" value="<?php echo $data_update->size?>">
                            </div>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-default" href="<?php base_url2()?>size">Cancel</a>
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    'use strict';

    $(document).ready(function () {

    });
</script>