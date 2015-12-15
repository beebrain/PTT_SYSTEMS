<?php $this->load->view("newTemp/head.php") ?>
<div class="app-container">
    <div class="row content-container">
        <?php $this->load->view("newTemp/navhead.php") ?>

        <?php $this->load->view("newTemp/navside.php") ?>

        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">

                <div class="row">
                    <div class="col-lg-offset-1 col-lg-10">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                 
                                    <div class="title"><i class="fa fa-camera fa-fw"></i>Area Manager <span class="pull-right"><a href="#" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus-circle"></i></a> </span></div>
                               
                                <div class="clear-both"></div>
                            </div>
                            <div class="panel-body ">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="company_table">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>AreaManager Name</th>
                                                <th style="width: 1%" class="text-center">E</th>
                                                <th style="width: 1%" class="text-center">D</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $allmanager;
                                            foreach ($allmanager as $key => $value) {
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $value->id ?></td>
                                                    <td><?= $value->name ?></td>
                                                    <td class="text-center" ><a href="#" id="edit" ><i class="fa fa-edit" ></i></a></td>  
                                                    <td class="text-center" > <a href="#"  id="delete" ><i class="fa fa-trash"></i></a>
                                                    </td>
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


            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <form role="form" action="<?php echo base_url('index.php/AreaManager/addManager') ?>" method="post">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Add AreaManager</h4>
                            </div>
                            <div class="modal-body">
                                <div class="panel-group" id="accordion">
                                    <div class="form-group">
                                        <label>AreaManager Name</label>
                                        <input class="form-control" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                </form>

                <!-- /.modal-dialog -->
            </div>

            <!-- updateModal -->

            <div class="modal fade" id="updateModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <form role="form" action="<?php echo base_url('index.php/AreaManager/updateManager') ?>" method="post">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Update AreaManager</h4>
                            </div>
                            <div class="modal-body">
                                <div class="panel-group" id="accordion">
                                    <div class="form-group">
                                        <label>AreaManager Name</label>

                                        <input class="form-control" name="updateName" value="" id="updateName">
                                        <input type="hidden" class="form-control" name="updateId" value="" id="updateId">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                </form>

                <!-- /.modal-dialog -->
            </div>
            <?php $this->load->view("newTemp/script"); ?>
            <script>

                function updateManager(id) {


                }


                $(".example3-2").on('click', function () {
                    $.confirm({
                        title: 'Delete!',
                        content: 'ต้องการลบ AreaManager ',
                        confirmButton: "Yes",
                        cancelButton: "Cancel",
                        confirmButtonClass: "btn-danger",
                        cancelButtonClass: "btn-warning",
                        confirm: function () {
                            id = $(".example3-2").attr("id");
                            console.log("<?php echo base_url('index.php/AreaManager/deleteManager/') . "/" ?>" + id);
                            window.location.href = "<?php echo base_url('index.php/AreaManager/deleteManager/') . "/" ?>" + id
                        },
                        cancel: function () {
                        }
                    });
                });



                var table = $('#company_table').DataTable({
                    "dom": '<"top"fl<"clear">>rt<"bottom"ip<"clear">>',
                    "columnDefs": [
                        {
                            "targets": 3,
                            "orderable": false
                        },
                        {
                            "targets": 2,
                            "orderable": false
                        }
                    ]
                });

                table.on('click', '#edit', function () {
                    /* get data onclick */
                    var tr = $(this).closest('tr');
                    var row = table.row(tr);
                    var data = row.data();
                    $('#updateName').val(data[1]);
                    $('#updateId').val(data[0]);
                    $('#updateModel').modal('show');

                });

                table.on('click', '#delete', function () {
                    /* get data onclick */
                    var tr = $(this).closest('tr');
                    var row = table.row(tr);
                    var data = row.data();
                    $.confirm({
                        title: 'Delete!',
                        content: 'ต้องการลบ AreaManager ',
                        confirmButton: "Yes",
                        cancelButton: "Cancel",
                        confirmButtonClass: "btn-danger",
                        cancelButtonClass: "btn-warning",
                        confirm: function () {
                            console.log(data);
                            id = data[0];
                            console.log("<?php echo base_url('index.php/AreaManager/deleteManager/') . "/" ?>" + id);
                            window.location.href = "<?php echo base_url('index.php/AreaManager/deleteManager/') . "/" ?>" + id
                        },
                        cancel: function () {
                        }
                    });

                });


            </script>

            <?php $this->load->view("newTemp/footer"); ?>



