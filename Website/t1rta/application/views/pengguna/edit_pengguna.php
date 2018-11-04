<?php
echo $sidebar;



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            pengguna
            <small>Edit pengguna</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Home</a></li>
            <li class="active">Edit pengguna</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit pengguna</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form role="form" action="<?php base_url2()?>pengguna/save_change" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $data_update->user_id?>">
                     <input type="hidden" name="lvl" value="<?php echo $data_update->level?>">

                    <div class="form-group">
                            <label for="exampleInputEmail1" class="pull-left m-label col-sm-1">Username</label>
                            <div class="col-sm-5">
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username" value="<?php echo $data_update->username ?>">
                            </div>
                        </div>
                        <div class="clearfix"></div><br>
                         <div class="form-group">
                            <label for="exampleInputEmail1" class="pull-left m-label col-sm-1">Password</label>
                            <div class="col-sm-5">
                                <input type="text" name="pass" class="form-control" id="exampleInputEmail1" placeholder="Password">
                            </div>
                        </div>
                        <div class="clearfix"></div><br>
                         <div class="form-group">
                            <label for="exampleInputEmail1" class="pull-left m-label col-sm-1">Nama</label>
                            <div class="col-sm-5">
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="nama" value="<?php echo $data_update->name?>">
                            </div>
                        </div>
                        <div class="clearfix"></div><br>



                 
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-default" href="<?php base_url2()?>pengguna">Cancel</a>
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    'use strict';

    $(document).ready(function () {
        $('#highlight').summernote({
            height: 200
        });

        $('#content').summernote({
            height: 500
        });
    });
</script>