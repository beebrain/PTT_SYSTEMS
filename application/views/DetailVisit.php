<?php $this->load->view("newTemp/head.php") ?>
<div class="app-container">
    <div class="row content-container">
        <?php $this->load->view("newTemp/navhead.php") ?>

        <?php $this->load->view("newTemp/navside.php") ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('asserts') ?>/css/slick.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('asserts') ?>/css/slick-theme.css">
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">

                <div class="row no-margin-bottom">

                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4>

                                    Visiting Detail 
                                    <span class="pull-right"><div class="btn-group btn-group-sm pull-right" role="group">
                                            <a href="<?php echo base_url() . "index.php/CompanyManage/editHistoryform/" . $visit->vis_id ?>" > <i class="fa fa-edit" style="color: rgb(255, 119, 66);"></i> </a>
                                            <a href="#" onclick="deleteCon('<?= $visit->vis_id ?>')" ><i class="fa fa-trash"></i> <a>
                                                    <a href="<?php echo base_url() . "index.php/CompanyManage/showHistory/" . $visit->company_id ?>" ><i class="fa fa-close fa-fw" style="color: black"></i></a> 
                                                    </div>
                                                    </span>
                                                    </h4>
                                                    </div>

                                                    <div class="panel panel-default">
                                                        <div id="collapseOne" class="panel-collapse collapse in " aria-expanded="true">
                                                            <table class="table table-bordered "> 
                                                                <tr>
                                                                    <td class="field-label col-lg-2 col-xs-2 active">
                                                                        <label>Visit Date:</label>
                                                                    </td>
                                                                    <td class="field-label col-lg-2 col-xs-2 ">
                                                                        <?= date('d-m-Y', strtotime($visit->vis_date)); ?>

                                                                    </td>
                                                                    <td class="field-label col-lg-2  col-xs-2 active">
                                                                        <label>Objective:</label>
                                                                    </td>
                                                                    <td >
                                                                        <?php
                                                                        echo $visit->objective;
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="field-label col-lg-2  col-xs-2 active">
                                                                        <label>App Date:</label>
                                                                    </td>
                                                                    <td >
                                                                        <?php
                                                                        if ($visit->tentative == '1') {
                                                                            echo "Tentative";
                                                                        } else {
                                                                            echo date('d-m-Y', strtotime($visit->app_date));
                                                                        }
                                                                        ?>

                                                                    </td>
                                                                    <td class="field-label col-lg-2  col-xs-2 active">
                                                                        <label>Team:</label>
                                                                    </td>
                                                                    <td >
                                                                        <?php
                                                                        foreach (explode(",", $visit->team) as $key1 => $value1) {
                                                                            echo "<p>$value1</p>";
                                                                        }
                                                                        ?>
                                                                    </td>

                                                                </tr>
                                                                <tr >
                                                                    <td class="field-label col-lg-2  col-xs-2 active">
                                                                        <label>Detail:</label>
                                                                    </td>
                                                                    <td colspan="3">
                                                                        <?= $visit->detail ?>
                                                                    </td>

                                                                </tr>
                                                                <tr >
                                                                    <td class="field-label col-lg-2  col-xs-2 active">
                                                                        <label>Service:</label>
                                                                    </td>
                                                                    <td colspan="3">
                                                                        <?= $visit->service ?>
                                                                    </td>

                                                                </tr>
                                                                <tr >
                                                                    <td class="field-label col-lg-2  col-xs-2 active">
                                                                        <label>Recommend Product:</label>
                                                                    </td>
                                                                    <td colspan="3">
                                                                        <?= $visit->rec_pro ?>
                                                                    </td>

                                                                </tr>

                                                            </table>

                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12 text-center no-margin-bottom" style="margin-bottom:0px">
                                                                <h4><label class="text-center">Picture</label></h4>
                                                            </div>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-lg-12 text-center" id="slide_stick" style="height:400px;" >
                                                                <?php
                                                                foreach ($image as $key => $value) {

                                                                    echo "<div ><img src='" . base_url() . "upload/" . $value->link_img . "' align= center /></div>";
                                                                }
                                                                ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>


                                                    </div>
                                                    </div>

                                                    <?php $this->load->view("newTemp/script"); ?>
                                                    <?php $this->load->view("newTemp/footer"); ?>
                                                    <script src="<?php echo base_url('asserts') ?>/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
                                                    <script src="<?php echo base_url('asserts') ?>/js/date-uk.js"></script>
                                                    <script src="<?php echo base_url('asserts/js/bootstrap-datepicker.js') ?>"></script>
                                                    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
                                                    <script type="text/javascript" src="<?php echo base_url('asserts') ?>/js/slick.js"></script>
                                                    <script>

                                                    $('#slide_stick').slick({
                                                    //autoplay: true,
                                                    //autoplaySpeed: 5000,
                                                    arrows: false,
                                                    dots: true,
                                                //speed: 800,
                                                fade: true
                                                    });

                                                    function deleteCon(id) {
                                                        /* get data onclick */

                                                        $.confirm({
                                                        title: 'Delete!',
                                                        content: 'ต้องการลบ หรือไม่ ',
                                                        confirmButton: "Yes",
                                                        cancelButton: "Cancel",
                                                        confirmButtonClass: "btn-danger",
                                                        cancelButtonClass: "btn-warning",
                                                            confirm: function () {
                                                            //   aler("x");
                                                            console.log("<?php echo base_url('index.php/CompanyManage/deleteVis/') . "/" ?>" + id);
                                                                        window.location.href = "<?php echo base_url('index.php/CompanyManage/deleteVis/') . "/" ?>" + id;
                                                                                    },
                                                                                cancel: function () {
                                                                            }
                                                    });

                                                }
                                                    </script>




