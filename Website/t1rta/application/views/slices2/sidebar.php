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
            
            <!--  Master    -->
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
            
            <!-- product -->
            <li class="<?php echo ($this->uri->segment(1) == 'product' ? 'active' : '')?>">
                <a href="<?php base_url2()?>product">
                    <i class="fa fa-cube"></i> <span>Product</span>
                </a>
            </li><!-- /endproduct -->


            <li class="treeview <?php echo (( $this->uri->segment(1) == 'order' || $this->uri->segment(1) == 'confirm_payment'  ) ? 'active' : '')?>">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Transaction</span>
                    <i class="fa fa-angle-left pull-right"></i>
                    <?php
                    if($notification_order > 0) {
                        ?>
                        <span class="label label-primary pull-right"><?php echo $notification_order?></span>
                    <?php
                    }
                    ?>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($this->uri->segment(1) == 'order' ? 'active' : '')?>">
                        <a href="<?php base_url2()?>order">
                            <i class="fa fa-cart-arrow-down"></i>
                            <span>Order</span>
                            <?php
                            if($notification_order > 0) {
                                ?>
                                <span class="label label-primary pull-right"><?php echo $notification_order?></span>
                            <?php
                            }
                            ?>
                        </a>
                    </li>
                    <li class="<?php echo ($this->uri->segment(1) == 'confirm_payment' ? 'active' : '')?>">
                        <a href="<?php base_url2()?>confirm_payment">
                            <i class="fa fa-usd"></i> <span>Confirm Payment</span>
                        </a>
                    </li>
                </ul>
            </li>

            
            <li class="treeview <?php echo (( $this->uri->segment(1) == 'explore' || $this->uri->segment(1) == 'projects' || $this->uri->segment(1) == 'lookbook' || $this->uri->segment(1) == 'ambassador' ) ? 'active' : '')?>">
                <a href="#">
                    <i class="fa  fa-plane"></i>
                    <span>Journal</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>       
                <ul class="treeview-menu">
                      <li class="treeview <?php echo (($this->uri->segment(1) == 'explore' || $this->uri->segment(1) == 'projects')? 'active' : '') ?>">
                        <a href="#">
                            <i class="glyphicon glyphicon-lock"></i>
                            <span>Stories</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php echo ($this->uri->segment(1) == 'explore' ? 'active' : '')?>">
                                <a href="<?php base_url2()?>explore">
                                    <i class="fa  fa-subway"></i> <span>Explore Beautifull Place</span>
                                </a>
                            </li>
                            <li class="<?php echo ($this->uri->segment(1) == 'projects' ? 'active' : '')?>">
                                <a href="<?php base_url2()?>projects">
                                    <i class="fa fa-bus"></i> <span>Projects</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php echo ($this->uri->segment(1) == 'lookbook' ? 'active' : '')?>">
                        <a href="<?php base_url2()?>lookbook">
                            <i class="fa fa-train"></i> <span>Lookbook</span>
                        </a>
                    </li>
                    <li class="<?php echo ($this->uri->segment(1) == 'ambassador' ? 'active' : '')?>">
                        <a href="<?php base_url2()?>ambassador">
                            <i class="fa fa-ship"></i> <span>Ambassador</span>
                        </a>
                    </li>
               </ul>
            </li>

              <li class="<?php echo ($this->uri->segment(1) == 'pages' ? 'active' : '')?>">
                <a href="<?php base_url2()?>pages">
                    <i class="fa  fa-print"></i> <span>Information</span>
                </a>
            </li><!-- /endproduct -->

             <li class="<?php echo ($this->uri->segment(1) == 'newsletter' ? 'active' : '')?>">
                <a href="<?php base_url2()?>newsletter">
                    <i class="fa fa-comment"></i> <span>Newsletter</span>
                </a>
            </li>

            <li class="treeview <?php echo (($this->uri->segment(1) == 'email' || $this->uri->segment(1) == 'slide' || $this->uri->segment(1) == 'logout' || $this->uri->segment(1) == 'slidecollection') ? 'active' : '')?>">
                <a href="#">
                    <i class="fa fa-gear"></i>
                    <span>Setting</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($this->uri->segment(1) == 'email' ? 'active' : '')?>">
                        <a href="<?php base_url2()?>email">
                            <i class="fa fa-envelope"></i> <span>Email</span>
                        </a>
                    </li>
                    <li class="<?php echo ($this->uri->segment(1) == 'slide' ? 'active' : '')?>">
                        <a href="<?php base_url2()?>slide">
                            <i class="fa fa-laptop"></i> <span>Slide</span>
                        </a>
                    </li>
                    <li class="<?php echo ($this->uri->segment(1) == 'slidecollection' ? 'active' : '')?>">
                        <a href="<?php base_url2()?>slidecollection">
                            <i class="fa fa-laptop"></i> <span>Collection</span>
                        </a>
                    </li>
                    <li class="<?php echo ($this->uri->segment(1) == 'logout' ? 'active' : '')?>">
                        <a href="<?php base_url2()?>logout">
                            <i class="fa fa-gears"></i> <span>logout</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>