<aside class="left-sidebar">
    <div class="d-flex no-block nav-text-box align-items-center">
        <span><img src="<?php echo base_url()?>assets/update/banhji-blank.png" style="height: 39px;" alt="elegant admin template"></span>
        <a class="nav-lock waves-effect waves-dark ml-auto hidden-md-down" href="javascript:void(0)"><i class="mdi mdi-toggle-switch"></i></a>
        <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i class="ti-menu ti-close" style="color: #fff; font-weight: 700; font-size: 20px;"></i></a>
    </div>
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>micro/home" aria-expanded="false">
                        <i class="ti-panel"></i>
                        <span class="hide-menu" data-bind="text: lang.lang.home"></span>
                    </a>
                </li>
                <!-- <li>
                    <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>micro/check_out" aria-expanded="false">
                        <i class=" ti-view-list-alt"></i>
                        <span class="hide-menu" data-bind="text: lang.lang.check_out"></span>
                    </a>
                </li> -->
                <li>
                    <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>micro/sales" aria-expanded="false">
                        <i class="ti-receipt"></i>
                        <span class="hide-menu" data-bind="text: lang.lang.sale"></span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>micro/purchases" aria-expanded="false">
                        <i class="ti-view-list"></i>
                        <span class="hide-menu" data-bind="text: lang.lang.micropurchase"></span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>micro/items" aria-expanded="false">
                        <i class="ti-layout-grid2"></i>
                        <span class="hide-menu" data-bind="text: lang.lang.products_services"></span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>micro/cashs" aria-expanded="false">
                        <i class="ti-wallet"></i>
                        <span class="hide-menu" data-bind="text: lang.lang.cash"></span>
                    </a>
                </li>
                <li class="dropdown-divider"></li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-settings"></i>
                        <span class="hide-menu" data-bind="text: lang.lang.setting"></span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <!-- <li><a href="<?php echo base_url(); ?>micro/setting#/pos_setting" ><i class="ti-receipt"></i><span data-bind="text: lang.lang.pos_setting"></span></a></li> -->
                        <li><a href="<?php echo base_url(); ?>micro/setting#/customer_setting" ><i class="ti-receipt"></i><span data-bind="text: lang.lang.customer_setting"></span></a></li>
                        <li><a href="<?php echo base_url(); ?>micro/setting#/vendor_setting" ><i class="ti-view-list"></i><span  data-bind="text: lang.lang.purchase_settinig"></span></a></li>
                        <li><a href="<?php echo base_url(); ?>micro/setting#/item_setting" ><i class="ti-layout-grid2"></i><span data-bind="text: lang.lang.inventory_setting"></span></a></li>
                    </ul>
                </li>
                <!-- <li class="dropdown-divider"></li> 
                <li>
                    <a class="waves-effect waves-dark app-icon" href="<?php echo base_url(); ?>app" aria-expanded="false">
                        <span class="hide-menu" data-bind="text: lang.lang.app_center"></span>
                        <img style="width: 20px; float: right; margin-right: 6px;" src="<?php echo base_url(); ?>assets/micro/app.ico">
                    </a>
                </li> -->
                <!-- <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-bookmark-alt"></i>
                        <span class="hide-menu" data-bind="text: lang.lang.user_guide"></span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>micro/guide#/home_guide" ><i class="ti-panel"></i><span data-bind="text: lang.lang.home"></span></a></li>
                        <li><a href="<?php echo base_url(); ?>micro/guide#/customer_guide" ><i class="ti-receipt"></i><span data-bind="text: lang.lang.sale"></span></a></li>
                        <li><a href="<?php echo base_url(); ?>micro/guide#/vendor_guide" ><i class="ti-view-list"></i><span  data-bind="text: lang.lang.micropurchase"></span></a></li>
                        <li><a href="<?php echo base_url(); ?>micro/guide#/item_guide" ><i class="ti-layout-grid2"></i><span data-bind="text: lang.lang.products_services"></span></a></li>
                        <li><a href="<?php echo base_url(); ?>micro/guide#/cash_guide" ><i class="fa fa-dollar"></i><span data-bind="text: lang.lang.cash"></span></a></li>
                    </ul>
                </li> -->
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>