<?php
echo $sidebar;



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pengguna
            <small>Pengguna</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Home</a></li>
            <li class="active">Pengguna</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Pengguna</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
            <div class="box-tools">
                <a href="<?php base_url2()?>pengguna/add" class="btn btn-primary">Tambah</a>
                <button class="btn btn-danger" id="btn_delete">Hapus</button>
            </div>
            <br>
                <?php
                alert_success_add('Success add Pengguna.');
                alert_failed_add('Failed add Pengguna!');
                alert_success_update('Success update Pengguna.');
                alert_failed_update('Failed update Pengguna!');
                alert_success_delete('Success delete Pengguna.');
                alert_failed_delete('Failed delete Pengguna!');
                ?>
            <div class="box-tools">
                <div class="input-group input-group-sm pull-left" style="width: 150px;">
                    <label class="pull-left m-label">Show</label>
                    <select id="table_max" class="form-control" style="width: 70px">
                        <option value="5" <?php echo ($max == 5 ? 'selected' : '')?>>5</option>
                        <option value="10" <?php echo ($max == 10 ? 'selected' : '')?>>10</option>
                        <option value="25" <?php echo ($max == 25 ? 'selected' : '')?>>25</option>
                        <option value="50" <?php echo ($max == 50 ? 'selected' : '')?>>50</option>
                        <option value="100" <?php echo ($max == 100 ? 'selected' : '')?>>100</option>
                    </select>
                </div>

                <div class="input-group input-group-sm pull-right" style="width: 150px;">
                    <input type="text" name="table_search" id="table_search" class="form-control pull-right" placeholder="Search" value="<?php echo $search;?>">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default" id="btn_search"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <br><br>

            <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th style="width: 20px"><input type="checkbox" id="check_all"></th>
                <th style="width: 50px">No</th>
                <th>Username</th>
                <th>nama</th>
                <th>Level</th>
                
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            if($data_table != ''){
                foreach($data_table as $row) {
                    ?>
                    <tr>
                    <?php if ($row->level == 2){
                        ?> <td><input type="checkbox" class="cb" id="cb_<?php echo $no?>" value="<?php echo $row->user_id ?>"></td>
                    <?php }  else {?> <td></td> <?php } ?> 
                        
                        <td><?php echo $no ?></td>
                        <td><a href="<?php base_url2()?>pengguna/update/<?php echo $row->user_id ?>"><?php echo $row->username ?></a></td>
                         <td><a href="<?php base_url2()?>pengguna/update/<?php echo $row->user_id ?>"><?php echo $row->name ?></a></td>
                          <td><a href="<?php base_url2()?>pengguna/update/<?php echo $row->user_id ?>"><?php echo $row->level?></a></td>
                        
                    </tr>
                <?php
                    $no++;
                }
            }
            ?>
            </tbody>
            </table>

            <div class="row">
                <br>
                <div class="col-sm-5">
                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing <?php echo $start?> to <?php echo $stop?> of <?php echo $max_row?> entries</div>
                </div>
                <div class="col-sm-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                        <ul class="pagination">
                            <li <?php if($page==1)echo 'class="disabled"'?>><a <?php if($page>1){?>href="<?php echo base_url()."Pengguna/index/1/".$order."/".$max."/".$search;?>"<?php }?>>First</a></li>
                            <li <?php if($page==1)echo 'class="disabled"'?>><a <?php if($page>1){?>href="<?php echo base_url()."Pengguna/index/".($page-1)."/".$order."/".$max."/".$search;?>"<?php }?>>Previous</a></li>

                            <?php
                            $start = 1;
                            $stop = 5;
                            if($page <= 3){
                                if($max_page > 5){
                                    $stop = $start + 4;
                                } else {
                                    $stop = $max_page;
                                }
                            } else {
                                if($max_page > 5){
                                    if(($max_page - $page) >= 2){
                                        $start = $page - 2;
                                        $stop = $start + 4;
                                    } else if(($max_page - $page) == 1){
                                        $start = $page - 3;
                                        $stop = $start + 4;
                                    } else {
                                        $start = $page - 4;
                                        $stop = $start + 4;
                                    }
                                } else {
                                    $stop = $max_page;
                                }
                            }
                            for($i=$start;$i<=$stop;$i++){
                                if($i == $page){
                                    echo '<li class="active"><a href="#">'.$i.'</a></li>';
                                } else {
                                    echo '<li><a href="'.base_url()."Pengguna/index/".$i."/".$order."/".$max."/".$search.'">'.$i.'</a></li>';
                                }
                            }
                            ?>

                            <li <?php if($page==$max_page)echo 'class="disabled"'?>><a <?php if($page<$max_page){?>href="<?php echo base_url()."Pengguna/index/".($page+1)."/".$order."/".$max."/".$search;?>"<?php }?>>Next</a></li>
                            <li <?php if($page==$max_page)echo 'class="disabled"'?>><a <?php if($page<$max_page){?>href="<?php echo base_url()."Pengguna/index/".$max_page."/".$order."/".$max."/".$search;?>"<?php }?>>Last</a></li>
                        </ul>
                    </div>
                </div>
            </div>

                <form action="<?php base_url2()?>Pengguna/drop" method="post" id="form_delete">
                    <input type="hidden" id="max_cb" name="max_cb" value="<?php echo $no?>">
                    <input type="hidden" id="data_delete" name="data_delete" value="">
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<div class="modal" id="empty_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Delete Information</h4>
            </div>
            <div class="modal-body">
                <p>No data selected!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<div class="modal" id="delete_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure to delete this?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="btn_action_delete">Delete</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script>
    'use strict';

    $(document).ready(function () {
        $('#check_all').change(function(){
            if($('#check_all').prop('checked')){
                $('.cb').prop('checked', true);
            } else {
                $('.cb').prop('checked', false);
            }
        });

        $('#btn_delete').click(function(){
            var max = $('#max_cb').val();
            var changed = 0;

            for(var i = 1; i <= max; i++){
                if($('#cb_'+i).prop('checked')){
                    changed = i;
                    i = ++max;
                }
            }

            if(changed != 0){
                $('#delete_modal').modal('show');
            } else {
                $('#empty_modal').modal('show');
            }
        }).mousedown(function(){
            var max = $('#max_cb').val();
            var val = '';
            for(var i = 1; i <= max; i++){
                if($('#cb_'+i).prop('checked')){
                    val += $('#cb_'+i).val() + ',';
                }
            }

            if(val != ''){
                val = val.substr(0, val.length - 1);
            }

            $('#data_delete').val(val);
        });
        //$('#my_modal').modal('show');

        $('#btn_search').click(function(){
            redir();
        });

        $('#table_max').change(function(){
            redir();
        });

        $('#table_search').keydown(function(e){
            if(e.keyCode == 13){
                redir();
            }
        });

        function redir(){
            var search = $('#table_search').val();
            var max = $('#table_max').val();
            var page = '<?php echo $page?>';
            var order = '<?php echo $order?>';

            window.location.href = '<?php base_url2()?>Pengguna/index/' + page + '/' + order + '/' + max + '/' + search;
        }

        $('#btn_action_delete').click(function(){
            var data_delete = $('#data_delete').val();
            $('#form_delete').submit();
        });
    });
</script>