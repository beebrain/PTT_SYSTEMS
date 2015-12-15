<div class="side-menu">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header navbar-header2">
                <a class="navbar-brand" href="#">
                    <div class="icon fa fa-paper-plane"></div>
                    <div class="title">PTT Company</div>
                </a>
                <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                    <i class="fa fa-times icon"></i>
                </button>
            </div>
            <ul class="nav navbar-nav">
                <li >
                    <a href="<?php echo base_url("index.php/AreaManager/showManager") ?> ">
                        <span class="icon fa fa-apple"></span><span class="title">Area Manager</span>
                    </a>
                </li>
                <li >
                    <a href="<?php echo base_url("index.php/DealerManager/showDealer") ?> ">
                        <span class="icon fa fa-sellsy"></span><span class="title">Dealer Manager</span>
                    </a>
                </li>
                <li >
                    <a href="<?php echo base_url("index.php/TeamManager/showTeam") ?> ">
                        <span class="icon fa fa-tachometer"></span><span class="title">Team Manager</span>
                    </a>
                </li>
                <!-- <li >
                     <a href="<?php echo base_url('index.php/CompanyManage/showCompany') ?>">
                         <span class="icon fa fa-compass"></span><span class="title">Company Manage</span>
                     </a>
                 </li>
                
                -->
                <li >
                    <a href="<?php echo base_url('index.php/CompanyManage/Visitor') ?>">
                        <span class="icon fa fa-ambulance"></span><span class="title">Visitor Systems</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</div>