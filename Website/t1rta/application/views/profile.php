<?php
echo $sidebar;



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile
            <small>Edit Profile</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Home</a></li>
            <li class="active">Edit Profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Profile</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form role="form" action="<?php base_url2()?>home/save_profile" method="post">
                    <div class="box-body">

                        <?php
                        alert_success_update('Success update profile.');
                        alert_failed_update('Failed update profile!');
                        ?>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="pull-left m-label col-sm-1">Name</label>
                            <div class="col-sm-4">
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name" value="<?php echo $this->session->userdata('name')?>">
                            </div>
                        </div>
                        <div class="clearfix"></div><br>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="pull-left m-label col-sm-1">Username</label>
                            <div class="col-sm-3">
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username" value="<?php echo $this->session->userdata('username')?>">
                            </div>
                        </div>
                        <div class="clearfix"></div><br>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="pull-left m-label col-sm-1">Password</label>
                            <div class="col-sm-3">
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Password">
                            </div>
                        </div>
                        <div class="clearfix"></div><br>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="pull-left m-label col-sm-1">Confirm Password</label>
                            <div class="col-sm-3">
                                <input type="password" name="conf_password" class="form-control" id="exampleInputEmail1" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="clearfix"></div><br>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-default" href="<?php base_url2()?>home">Cancel</a>
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