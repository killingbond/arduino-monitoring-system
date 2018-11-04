<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php echo ($this->uri->segment(1) == '' ? 'active' : '')?>">
                <a href="<?php base_url2()?>">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            
            <!--  Master    
            <li class="treeview <?php echo (( $this->uri->segment(1) == 'size' || $this->uri->segment(1) == 'product_collection' || $this->uri->segment(1) == 'product_type' || $this->uri->segment(1) == 'product_apparel' || $this->uri->segment(1) == 'product_collaboration' || $this->uri->segment(1) == 'product_accessories' || $this->uri->segment(1) == 'product_swimwear' ) ? 'active' : '')?>">
                <a href="#">
                    <i class="fa fa-sticky-note"></i>
                    <span>Master</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview <?php echo (($this->uri->segment(1) == 'product_collection' || $this->uri->segment(1) == 'product_type')? 'active' : '') ?>">
                        <a href="#">
                            <i class="glyphicon glyphicon-lock"></i>
                            <span>Bags</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php echo ($this->uri->segment(1) == 'product_collection' ? 'active' : '')?>">
                                <a href="<?php base_url2()?>product_collection">
                                    <i class="fa fa-cube"></i> <span>Collection</span>
                                </a>
                            </li>
                            <li class="<?php echo ($this->uri->segment(1) == 'product_type' ? 'active' : '')?>">
                                <a href="<?php base_url2()?>product_type">
                                    <i class="fa fa-cube"></i> <span>Type</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php echo ($this->uri->segment(1) == 'product_apparel' ? 'active' : '')?>">
                        <a href="<?php base_url2()?>product_apparel">
                            <i class="fa fa-cube"></i> <span>Apparel</span>
                        </a>
                    </li>
                    <li class="<?php echo ($this->uri->segment(1) == 'product_accessories' ? 'active' : '')?>">
                        <a href="<?php base_url2()?>product_accessories">
                            <i class="fa fa-cube"></i> <span>Accessories</span>
                        </a>
                    </li>
                    <li class="<?php echo ($this->uri->segment(1) == 'product_collaboration' ? 'active' : '')?>">
                        <a href="<?php base_url2()?>product_collaboration">
                            <i class="fa fa-cube"></i> <span>Collaboration</span>
                        </a>
                    </li>
                    <li class="<?php echo ($this->uri->segment(1) == 'size' ? 'active' : '')?>">
                        <a href="<?php base_url2()?>size">
                            <i class="fa fa-arrows-h"></i> <span>Size</span>
                        </a>
                    </li>
                </ul>
            </li> <!--/ endmaster -->
            <?php  if(($this->session->userdata('is_login') != '')&&($this->session->userdata('level')==1)){ ?>
            <!-- product -->
            <li class="<?php echo ($this->uri->segment(1) == 'pengguna' ? 'active' : '')?>">
                <a href="<?php base_url2()?>pengguna">
                    <i class="fa fa-cube"></i> <span>Pengguna</span>
                </a>
            </li>
            <li class="<?php echo ($this->uri->segment(1) == 'product' ? 'active' : '')?>">
                <a href="<?php base_url2()?>debit">
                    <i class="fa fa-cube"></i> <span>Debit Air</span>
                </a>
            </li>
            <li class="<?php echo ($this->uri->segment(1) == 'ph' ? 'active' : '')?>">
                <a href="<?php base_url2()?>ph">
                    <i class="fa fa-cube"></i> <span>PH</span>
                </a>
            </li><!-- /endproduct <!-- /endproduct 

           <?php }else if(($this->session->userdata('is_login') != '')&&($this->session->userdata('level')==2)) { ?>
                   <li class="<?php echo ($this->uri->segment(1) == 'ph' ? 'active' : '')?>">
                <a href="<?php base_url2()?>ph">
                    <i class="fa fa-cube"></i> <span>PH</span>
                </a>
            </li><!-- /endproduct <!-- /endproduct 
            <?php  } ?>
          <!-- /endproduct 

             <li class="<?php echo ($this->uri->segment(1) == 'newsletter' ? 'active' : '')?>">
                <a href="<?php base_url2()?>newsletter">
                    <i class="fa fa-comment"></i> <span>Newsletter</span>
                </a>
            </li>
            -->
            <li class="treeview <?php echo (($this->uri->segment(1) == 'email' || $this->uri->segment(1) == 'slide' || $this->uri->segment(1) == 'logout' || $this->uri->segment(1) == 'slidecollection') ? 'active' : '')?>">
                <li class="<?php echo ($this->uri->segment(1) == 'logout' ? 'active' : '')?>">
                        <a href="<?php base_url2()?>logout">
                            <i class="fa fa-gears"></i> <span>logout</span>
                        </a>
                    </li>            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>