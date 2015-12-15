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
                                    <div class="title"><i class="fa fa-bell fa-fw"></i>Show Company <span class="pull-right"><a href="<?php echo base_url('index.php/CompanyManage/showNewFormCompany') ?>" ><i class="fa fa-plus-circle"></i></a> </span></div>
                        
                                <div class="clear-both"></div>
                            </div>
                            <div class="panel-body ">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12">
                                        <label>Column</label>
                                        <select class="form-control" id="topicfill">
                                            <option value="0">CODE</option>
                                            <option value="1">COMPANY</option>
                                            <option value="2">AREA MANAGER</option>
                                            <option value="3">Dealer</option>
                                            <option value="4">Contact</option>
                                            <option value="5">Business</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <label>Search</label>
                                        <input type="text" class="form-control" id="search_text" value="">
                                    </div>
                                </div>
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="company_table">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%">com_code</th>
                                                <th style="width: 15%">COMPANY</th>
                                                <th style="width: 15%">AREA MANAGER</th>
                                                <th style="width: 15%">Dealer</th>
                                                <th style="width: 10%">Contact</th>
                                                <th style="width: 10%">Business</th>
                                                <th style="width: 1%" class="text-center">D</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // print_r($allCompany);
                                            foreach ($allCompany as $key => $value) {
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $value->company_code ?></td>
                                                    <td><a href="<?php echo base_url().'index.php/CompanyManage/showDetail/'.$value->company_code ?> "><?= $value->name ?></a> <a href="#" id="edit"><i class="fa fa-edit fa-fw pull-right"></i></a></td>
                                                    <td><?= $value->Aname ?></td>
                                                    <td><?= $value->Dname ?></td>
                                                    <td><?= $value->contact ?></td>
                                                    <td><?= $value->business ?></td>
                                                    <td  class="text-center" ><i class="fa fa-trash fa-fw" id="delete"></i></td>
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

            <script>


                var table = $('#company_table').DataTable({
                    "dom": '<"top"l<"clear">>rt<"bottom"ip<"clear">>',
                    // "dom": '<"top"l>t<"bottom"ip><"clear">',
                    "aaSorting": [],
                    "columnDefs": [
                        {
                            "targets": 6,
                            "orderable": false
                        }
                    ]
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


                table.on('click', '#edit', function () {
                    /* get data onclick */
                    var tr = $(this).closest('tr');
                    var row = table.row(tr);
                    var data = row.data();
                    console.log(data[0]);
                    window.location.href = "<?php echo base_url('index.php/CompanyManage/editCompany/') . "/" ?>" + data[0]
                });

                table.on('click', '#delete', function () {
                    /* get data onclick */
                    var tr = $(this).closest('tr');
                    var row = table.row(tr);
                    var data = row.data();
                    $.confirm({
                        title: 'Delete!',
                        content: 'ต้องการลบ Company หรือไม่ ',
                        confirmButton: "Yes",
                        cancelButton: "Cancel",
                        confirmButtonClass: "btn-danger",
                        cancelButtonClass: "btn-warning",
                        confirm: function () {
                            console.log(data);
                            id = data[0];
                            console.log("<?php echo base_url('index.php/CompanyManage/deleteCompany/') . "/" ?>" + id);
                            window.location.href = "<?php echo base_url('index.php/CompanyManage/deleteCompany/') . "/" ?>" + id
                        },
                        cancel: function () {
                        }
                    });

                });

            </script>




