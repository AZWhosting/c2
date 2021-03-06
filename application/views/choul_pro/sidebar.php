<aside class="left-sidebar">
    <div class="d-flex no-block nav-text-box align-items-center">
        <span><img src="<?php echo base_url()?>assets/choul_pro/img/choulr-logo1.png" style="height: 39px;" alt="elegant admin template"></span>
        <a class="nav-lock waves-effect waves-dark ml-auto hidden-md-down" href="javascript:void(0)"><i class="mdi mdi-toggle-switch"></i></a>
        <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
    </div>
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>choul_pro/home" aria-expanded="false">
                        <i class="ti-panel"></i>
                        <span class="hide-menu" data-bind="text: lang.lang.home"></span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>choul_pro/units" aria-expanded="false">
                        <i class="ti-view-list"></i>
                        <span class="hide-menu">Units</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>choul_pro/contracts" aria-expanded="false">
                        <i class="ti-receipt"></i>
                        <span class="hide-menu">Contracts</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>choul_pro/reciept" aria-expanded="false">
                        <i class="fa fa-dollar"></i>
                        <span class="hide-menu">Reciept</span>
                    </a>
                </li>
                <li class="dropdown-divider"></li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-settings"></i>
                        <span class="hide-menu" data-bind="text: lang.lang.setting"></span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="<?php echo base_url(); ?>choul_pro/setting#/properties" ><i class="ti-receipt"></i>
                                <span>Properties</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>choul_pro/setting#/units" ><i class="ti-receipt"></i>
                                <span >Units</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>choul_pro/setting#/utility" ><i class="ti-view-list"></i>
                                <span>Utilities</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>choul_pro/setting#/contracts" ><i class="ti-layout-grid2"></i>
                                <span>Contracts</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown-divider"></li> 
                <li>
                    <a class="waves-effect waves-dark app-icon" href="<?php echo base_url(); ?>app" aria-expanded="false">
                        <span class="hide-menu" data-bind="text: lang.lang.app_center"></span>
                        <img style="width: 20px; float: right; margin-right: 6px;" src="<?php echo base_url(); ?>assets/micro/app.ico">
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>