<?php $this->load->view("newTemp/head.php") ?>
<div class="app-container">
    <div class="row content-container">
        <?php $this->load->view("newTemp/navhead.php") ?>

        <?php $this->load->view("newTemp/navside.php") ?>

        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">

                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="title"><i class="fa fa-bell fa-fw"></i>Show Company 
                                    <span class="pull-right"><a href="<?php echo base_url('index.php/CompanyManage/showNewFormCompany') ?>" ><i class="fa fa-plus-circle"></i> Add Company</a> </span></div>

                                <div class="clear-both"></div>
                            </div>
                            <div class="panel-body ">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 form-group-sm form-inline">
                                        <select class="form-control " id="topicfill">
                                            <option value="">Select Column</option>
                                            <option value="0">CODE</option>
                                            <option value="1">COMPANY</option>
                                            <option value="2">Business</option>
                                            <option value="3">AREA MANAGER</option>
                                            <option value="4">Dealer</option>
                                            <option value="7">Current Product</option>
                                            <option value="8">Recommended Product</option>


                                        </select>
                                        <input type="text" class="form-control" id="search_text" name="search_text" value="" placeholder="Search">
                                    </div>

                                    <div class="col-lg-6 col-md-12 form-inline">

                                        <span class="pull-right">
                                            <?php
                                            $startDate = "";
                                            $endDate = "";
                                            if (isset($searchDate)) {
                                                $startDate = $searchDate['startDate'];
                                                $endDate = $searchDate['endDate'];
                                            }
                                            ?>

                                            <div class="input-daterange input-group" id="datepicker">

                                                <input type="text" class="input-sm form-control" name="startDate" id="startDate" value="<?= $startDate ?>"/>
                                                <span class="input-group-addon">to</span>
                                                <input type="text" class="input-sm form-control" name="endDate" id="endDate" value="<?= $endDate ?>" />
                                                <span class="input-group-addon"><i class="fa fa-search fa-fw" id="dateSearch" ></i></span>
                                            </div>

                                        </span>
                                        <div class="pull-right" ><label> Visit Date </label> </div>
                                    </div>
                                </div>
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="company_table">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>COMPANY</th>
                                                <th>Business</th>
                                                <th>Area Manager</th>
                                                <th>Dealer</th>
                                                <th>Objective</th>
                                                <th>Next App.</th>
                                                <th>Contact</th>
                                                <th>Current Product</th>
                                                <th>Recommended Product</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Next Company

                                            foreach ($allCompany as $key => $value) {
                                                ?>
                                                <tr class="odd gradeX">

                                                    <td><?= $value->company_code ?>

                                                        <p >
                                                            ( <?= $value->type ?> )
                                                        </p>
                                                       
                                                    </td>

                                                    <td style="width: 20%">
                                                        <a href="<?php echo base_url() . 'index.php/CompanyManage/showHistory/' . $value->company_id ?> "><?= $value->name ?></a> 
                                                        <a href="#" onclick="deleteCom('<?= $value->company_id ?>')">
                                                            <i class="fa fa-trash pull-right" id="delete"></i>
                                                        </a>
                                                        <a href="<?php echo base_url() . 'index.php/CompanyManage/editCompany/' . $value->company_id ?> "><i class="fa fa-edit pull-right"></i></a>

                                                    </td>
                                                    <td style="width: 25%">
                                                        <?php
                                                        echo mb_substr($value->business, 0, 70, 'UTF-8');
                                                        echo "...";
                                                        ?>
                                                    </td>
                                                    <td><?= $value->Aname ?></td>
                                                    <td><?= $value->Dname ?></td>
                                                    <td><?= $value->objective ?></td>
                                                    <td><?php
                                                        if ($value->tentative > 0) {
                                                            echo "Tentative";
                                                        } else {
                                                            echo date('d-m-Y', strtotime($value->v_app));
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= $value->c_contact ?></td>
                                                    <td><?= $value->current_product ?></td>
                                                    <td><?= $value->rec_pro ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>

                                            <?php
                                            // Mid Company
                                            if (isset($midCompany))
                                                foreach ($midCompany as $key => $value) {
                                                    ?>
                                                    <tr class="odd gradeX">

                                                        <td><?= $value->company_code ?>

                                                            <p >
                                                                ( <?= $value->type ?> )
                                                            </p>
                                                          
                                                        </td>

                                                        <td style="width: 20%">
                                                            <a href="<?php echo base_url() . 'index.php/CompanyManage/showHistory/' . $value->company_id ?> "><?= $value->name ?></a> 
                                                            <a href="#" onclick="deleteCom('<?= $value->company_id ?>')">
                                                                <i class="fa fa-trash pull-right" id="delete"></i>
                                                            </a>
                                                            <a href="<?php echo base_url() . 'index.php/CompanyManage/editCompany/' . $value->company_id ?> "><i class="fa fa-edit pull-right"></i></a>

                                                        </td>
                                                        <td style="width: 25%"><?php
                                                            echo mb_substr($value->business, 0, 70, 'UTF-8');
                                                            echo "...";
                                                            ?>
                                                        </td>
                                                        <td><?= $value->Aname ?></td>
                                                        <td><?= $value->Dname ?></td>
                                                        <td><?= $value->objective ?></td>
                                                        <td><?php
                                                            if ($value->tentative > 0) {
                                                                echo "Tentative";
                                                            } else {
                                                                echo date('d-m-Y', strtotime($value->v_app));
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?= $value->c_contact ?></td>
                                                        <td><?= $value->current_product ?></td>
                                                        <td><?= $value->rec_pro ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            ?>

                                            <?php
                                            // exit Company
                                            if (isset($exitCompany))
                                                foreach ($exitCompany as $key => $value) {
                                                    ?>
                                                    <tr class="odd gradeX">

                                                        <td><?= $value->company_code ?>
                                                            <p >
                                                                ( <?= $value->type ?> )
                                                            </p>

                                                        </td>

                                                        <td style="width: 20%">
                                                            <a href="<?php echo base_url() . 'index.php/CompanyManage/showHistory/' . $value->company_id ?> "><?= $value->name ?></a> 
                                                            <a href="#" onclick="deleteCom('<?= $value->company_id ?>')">
                                                                <i class="fa fa-trash pull-right" id="delete"></i>
                                                            </a>
                                                            <a href="<?php echo base_url() . 'index.php/CompanyManage/editCompany/' . $value->company_id ?> "><i class="fa fa-edit pull-right"></i></a>

                                                        </td>
                                                        <td style="width: 25%">
                                                            <?php
                                                            echo mb_substr($value->business, 0, 70, 'UTF-8');
                                                            echo "...";
                                                            ?>
                                                        </td>
                                                        <td><?= $value->Aname ?></td>
                                                        <td><?= $value->Dname ?></td>
                                                        <td>N/A</td>
                                                        <td>N/A
                                                        </td>
                                                        <td><?= $value->c_contact ?></td>
                                                        <td><?= $value->current_product ?></td>
                                                        <td><?= $value->rec_pro ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            ?>
                                        </tbody>

                                    </table>
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

            <script>


                                                        var table = $('#company_table').DataTable({
                                                            "dom": '<"top"l<"clear">>rt<"bottom"ip<"clear">>',
                                                            // "dom": '<"top"l>t<"bottom"ip><"clear">',
                                                            "aaSorting": [],
                                                            "aoColumnDefs": // Sort Date
                                                                    [
                                                                        {"sType": "date-uk",
                                                                            "aTargets": [6] // Taget column
                                                                        },
                                                                        {"sWidth": "6%", "aTargets": [0]  // Taget column
                                                                        },
                                                                        {
                                                                            "sWidth": "50px",
                                                                            "aTargets": [2],
                                                                            "bVisible": true
                                                                        },
                                                                        {
                                                                            "sWidth": "8%",
                                                                            "aTargets": [6],
                                                                            "bVisible": true
                                                                        },
                                                                        {
                                                                            "aTargets": [7, 8, 9],
                                                                            "bVisible": false
                                                                        },
                                                                    ]
                                                        });
                                                        $('.input-daterange').datepicker({
                                                            format: "dd-mm-yyyy",
                                                            autoclose: true,
                                                            todayHighlight: true
                                                        });
                                                        $('#dateSearch').on('click', function () {
                                                            window.location.href = "<?php echo base_url('index.php/CompanyManage/searchDate/') . "/" ?>" + $('#startDate').val() + "/" + $('#endDate').val();
                                                        });
                                                        $('#search_text').on('keyup', function () {
                                                            var index = $('#topicfill :selected').val();
                                                            console.log(index);
                                                            if (this.value == "") {
                                                                table.search('').columns().search('').draw();
                                                            } else {
                                                                console.log(index);
                                                                table.columns(index).search(this.value).draw();
                                                            }
                                                        });


                                                        function deleteCom(id) {
                                                            /* get data onclick */

                                                            $.confirm({
                                                                title: 'Delete!',
                                                                content: 'ต้องการลบ Company หรือไม่ ',
                                                                confirmButton: "Yes",
                                                                cancelButton: "Cancel",
                                                                confirmButtonClass: "btn-danger",
                                                                cancelButtonClass: "btn-warning",
                                                                confirm: function () {

                                                                    //console.log("<?php echo base_url('index.php/CompanyManage/deleteCompany/') . "/" ?>" + id);
                                                                    window.location.href = "<?php echo base_url('index.php/CompanyManage/deleteCompany/') . "/" ?>" + id
                                                                },
                                                                cancel: function () {
                                                                }
                                                            });

                                                        }


            </script>




