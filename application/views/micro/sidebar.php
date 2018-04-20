<aside class="left-sidebar">
    <div class="d-flex no-block nav-text-box align-items-center">
        <span><img src="<?php echo base_url()?>assets/update/banhji-blank.png" style="height: 39px;" alt="elegant admin template"></span>
        <a class="nav-lock waves-effect waves-dark ml-auto hidden-md-down" href="javascript:void(0)"><i class="mdi mdi-toggle-switch"></i></a>
        <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
    </div>
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>micro/home" aria-expanded="false">
                        <i class="ti-panel"></i>
                        <span class="hide-menu" data-bind="text: lang.lang.home">Home</span>

                    </a>                   
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>micro/sales" aria-expanded="false">
                        <i class="ti-receipt"></i>
                        <span class="hide-menu" data-bind="text: lang.lang.sale">Sales</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>micro/purchase" aria-expanded="false">
                        <i class="ti-view-list"></i>
                        <span class="hide-menu" data-bind="text: lang.lang.purchase">Purchases</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>micro/items" aria-expanded="false">
                        <i class="ti-layout-grid2"></i>
                        <span class="hide-menu" data-bind="text: lang.lang.items">Items</span>
                    </a>
                </li>
                <li class="dropdown-divider"></li>
                <li>
                    <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>micro/setting" aria-expanded="false">
                        <i class="ti-settings"></i>
                        <span class="hide-menu" data-bind="text: lang.lang.setting">Setting</span>
                    </a>
                </li>
                <li>
                    <a target="_blank" class="waves-effect waves-dark" href="<?php echo base_url(); ?>rrd" aria-expanded="false">
                        <i class="ti-files"></i>
                        <span class="hide-menu" data-bind="text: lang.lang.banhji">BanhJi</span>
                    </a>
                </li>
                <li>
                    <a target="_blank" class="waves-effect waves-dark" href="<?php echo base_url(); ?>micro/faq" aria-expanded="false">
                        <i class="ti-comments-smiley"></i>
                        <span class="hide-menu" data-bind="text: lang.lang.faq">FAQ</span>
                    </a>
                </li>
                <li>
                    <a target="_blank" class="waves-effect waves-dark" href="<?php echo base_url(); ?>micro/support" aria-expanded="false">
                        <i class="ti-headphone-alt"></i>
                        <span class="hide-menu" data-bind="text: lang.lang.support">Support</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>