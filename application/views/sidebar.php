<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li>
                    <a href="<?php echo base_url(); ?>">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="briefcase"></i>
                        <span data-key="t-components">Plataformas</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php foreach ($platformsList as $platform) { ?>
                            <li>
                                <?php echo anchor('platforms/' . $platform["platform_id"], $platform["platform_name"], array('title' => $platform["platform_name"]));?>                                
                            </li>
                        <?php } ?>
                    </ul>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->