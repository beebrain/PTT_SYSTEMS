<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-top-links">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Company</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">

        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-tasks">
                <li>
                    <a href="<?php echo base_url('index.php/companyControl/showCompany') ?> ">
                        Company Section
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?php echo base_url('index.php/AreaManager/showManager') ?> ">
                        AreaManager Section
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        Dealer Section
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        See All Tasks
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        See All Tasks
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-tasks -->
        </li>
        <!-- /.dropdown -->



        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->


    <!-- /.navbar-static-side -->
</nav>