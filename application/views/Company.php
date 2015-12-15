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
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="title"><i class="fa fa-bell fa-fw"></i>Area Manager <a href="#" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus-circle"></i></a> </div>
                                </div>
                                <div class="clear-both"></div>
                            </div>
                            <div class="card-body no-padding">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="company_table">
                                        <thead>
                                            <tr>
                                                <th>Code Manager</th>
                                                <th>Manager Name</th>
                                                <th>edit/delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $allmanager;
                                            foreach ($allmanager as $key => $value) {
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><a href=""><?= $value->id ?></a></td>
                                                    <td><?= $value->name ?></td>
                                                    <td><a>edit</a> <a>delete</a></td>
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
                    <div class="modal-dialog modal-lg ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Add Manager</h4>
                            </div>
                            <div class="modal-body">
                                <div class="panel-group" id="accordion">
                                    <div class="form-group">
                                        <label>Manager Name</label>
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

            <?php $this->load->view("newTemp/script"); ?>
            <script>


                var table = $('#company_table').DataTable({
                    "dom": '<"top"l>t<"bottom"ip><"clear">'
                });



            </script>

            <?php $this->load->view("newTemp/footer"); ?>



